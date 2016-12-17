<? $this->load->view('inc/head'); ?>
</head>
<body>
     <? $this->load->view('inc/top'); ?>
     <div class="container main">
          <?=$content->text;?>
     </div>
     <? $this->load->view('inc/footer');?>
</body>
</html>