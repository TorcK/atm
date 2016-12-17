<?php $this->load->view('admin/inc/head'); ?>
</head>
<body>
    <div class="text-center">
        <? if (isset($message) && $message) { ?>
        <div class="message"><?=$message;?></div>
        <? } ?>
        <form action="/admin/login" method="post">
            <fieldset>
                <legend>Логин</legend>
                логин&nbsp;:&nbsp;&nbsp;&nbsp;<input type="text" name="username" size="15"/><br/>
                пароль&nbsp;:&nbsp;<input type="password" name="password" size="15"/><br/>
                <input type="submit" name="go" value="Вход" size="15"/><br/>
            </fieldset>
        </form>
    </div>
    <?php $this->load->view('admin/inc/footer');?>
</body>
</html>