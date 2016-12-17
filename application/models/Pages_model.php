<?php
class Pages_model extends CI_Model
{
	
     function getList()
     {
        $result = $this->db->get('pages')
                            ->result();
        return $result;
    }
    
     function getListByCategory($category_id)
     {
        $result = $this->db->where('category_id', $category_id)
                           ->get('pages')
                           ->result();
        return $result;
    }
    
    function getOne($id)
    {
        $res = $this->db->where('id', $id)
                    ->get('pages')
                    ->result();
        return isset($res[0]) ? $res[0] : false;
    }
    
    function getOneByName($name)
    {
        $res = $this->db->where('name', $name)
                    ->get('pages')
                    ->result();
        return isset($res[0]) ? $res[0] : '';
    }
    
    function update($data)
    {
        $this->db->where('id', $data['id']);
        unset($data['id']);
        return $this->db->update('pages', $data);
    }
    
     function add($data)
     {
          return $this->db->insert('pages', $data);
     }

     /**
     * 
     * @param type $category_id
     * @return type
     */
     function delete($id)
     {
         return $this->db->delete('pages', ['id' => $id]);
     }
    
    /**
     * 
     * @param type $category_id
     * @return type
     */
    function deleteByCategory($category_id)
    {
         return $this->db->delete('pages', ['category_id' => $category_id]);
    }
}