<?php
class Category_model extends CI_Model
{
    
    function get_list_with_sub($only_public = false)
    {
          $categories = $this->get_list($only_public);
          foreach ($categories as $key => $one) {
               $categories[$key]->subcategories = $this->category_model->get_sub($one->id, $only_public);
          }
          return $categories;
    }
    
    function get_list($only_public = false)
    {
        if ($only_public) {
            $this->db->where('public', 1);
        }
        
        $result = $this->db->where('parent_id', 0)
                           ->order_by('order', 'ASC')
                           ->get('category')
                           ->result();
        return $result;
    }

    function get_count($where = '')
    {
        if ($where) {
                $this->db->where($where);
        }

        return $this->db->count_all_results('category');
    }
    
    function get_sub($parent_id, $only_public = false)
    {
        if ($only_public) {
            $this->db->where('public', 1);
        }
        
        $result = $this->db->order_by('order', 'ASC')
                           ->where('parent_id', $parent_id)
                           ->get('category')
                           ->result();
        return $result;
    }

    function get_parent($sub_id)
    {
        $sub = $this->get_one($sub_id);
        $result = $this->get_one($sub->parent_id);
        return $result;
    }
    
    function get_one($id)
    {
        $res = $this->db->where('id', $id)
                    ->get('category')
                    ->result();
        return isset($res[0]) ? $res[0] : false;
    }
    
    function get_one_by_name($nameT)
    {
        $res = $this->db->where('name_t', $nameT)
                    ->get('category')
                    ->result();
        return isset($res[0]) ? $res[0] : false;
    }
    
    function add_category($data)
    {
        $this->update_categoryes_order($data['order'], "+", $data['parent_id']);
        return $this->db->insert('category', $data);
    }
    
    function update_category($data)
    {
        $original = $this->get_one($data['id']);
        if ($original->order != $data['order']) {
            $this->update_categoryes_order($original->order, "-", $original->parent_id);
            $this->update_categoryes_order($data['order'], "+", $data['parent_id']);
        }
            
        $this->db->where('id', $data['id']);
        unset($data['id']);
        return $this->db->update('category', $data);
    }
    
    function delete_category($id)
    {
        $one = $this->get_one($id);
        if (!$one) {
            return false;
        }
        $this->update_categoryes_order($one->order, "-", $one->id);
        return $this->db->delete('category', array('id' => $id));
    }
       
    function update_categoryes_order($order, $to = '+', $parent_id = false)
    {
          $query_str = "
                 UPDATE `category`
                 SET `order` = `order` $to 1
                 WHERE `order` >= $order";
          if ($parent_id !== false) {
               $query_str .= " AND `parent_id` = {$parent_id}";
          }
          return $this->db->query($query_str);
    }

    /**
     * Check, is category exist.
     * If exist - return cat_id, if not - create and return cat_id
     */
    function upload_price_category($name)
    {
         $res = array();
         $query_sql = "SELECT `id` FROM `category` WHERE UPPER(`name`) LIKE UPPER('%{$name}%')";
         $query = $this->db->query($query_sql);
         $sql_res = $query->result();

         if ($sql_res) { //category exist
               $res['id'] = $sql_res[0]->id;
               //$res['message'] = "Category $name exist";
               $res['message'] = "";
         } else {  //We should create category
               $category_data = array();
               $category_data['name'] = $name;
               $category_data['name_t'] = translit_encode($category_data['name']);
               $category_data['title'] = $name;
               $category_data['description'] = $name;
               $category_data['order'] = $this->get_count(array('parent_id' => 0)) + 1;
               $category_data['public'] = 1;
          
               $this->db->insert('category', $category_data);
               
               $res['id'] = $this->db->insert_id();
               $res['message'] = "Create category $name";
          }
          return $res;
    }
    
    /**
     * Delete all records and images
     */
    function delete_all()
    {
         $this->db->empty_table('category');
    }
}