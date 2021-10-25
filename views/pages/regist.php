<!DOCTYPE html>
<html lang="ja">

<head>
  <?php require_once(__DIR__ . "/../components/head.php"); ?>
</head>
<body>
  <div id="app px-4">
    <div class="row mx-0">
      <div class="offset-0 col-12 col-md-6 offset-md-4">
        <h3 class="text-center">
          会員登録
        </h3>
        <form method="POST" id="registForm">
          <div class="form-group">
            <label for="userId">ユーザID</label>
            <input type="text" class="form-control" name="userId" id="userId">
          </div>
          <div class="form-group">
            <label for="userName">ユーザ名</label>
            <input type="text" class="form-control" name="userName" id="userName">
          </div>
          <div class="form-group">
            <label for="userPassWord">パスワード</label>
            <input type="password" class="form-control" name="userPassWord" id="userPassWord">
          </div>
          <div class="form-group">
            <button type="submit" class="btn btn-lg btn-primary form-control">登録する</buttton>
          </div>
        </form>
      </div>
    </div>
  </div>
</body>
<script>
    $('#registForm').submit(function(){
        event.preventDefault();
        console.log($(this).serializeArray())
        $.ajax({
            url: 'post/regist',
            type: 'POST',
            dataType: 'json',
            data: $(this).serializeArray(),
            timeout: 5000,
        }).done(function(data){
          if(data['CODE'] != 1){
            alert(data['MESSAGE']);
          }else{
            location.href="./home";
          }
        }).fail(function(){
            alert('内部エラーです。');
        });
    });
    </script>
</html>