<!DOCTYPE html>
<html>
 <head>
  <title>Webslesson Tutorial | How to Use Bootstrap Select Plugin with PHP JQuery</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/css/bootstrap-select.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/js/bootstrap-select.min.js"></script>

 </head>
 <body>
  <br /><br />
  <div class="container">
   <br />
   <h2 align="center">How to Use Bootstrap Select Plugin with PHP JQuery</h2>
   <br />
   <div class="col-md-4" style="margin-left:200px;">
    <form method="post" id="multiple_select_form">
     <select name="framework" id="framework" class="form-control selectpicker" data-live-search="true" multiple>
      <option value="Laravel">Laravel</option>
      <option value="Symfony">Symfony</option>
      <option value="Codeigniter">Codeigniter</option>
      <option value="CakePHP">CakePHP</option>
      <option value="Zend">Zend</option>
      <option value="Yii">Yii</option>
      <option value="Slim">Slim</option>
     </select>
     <br /><br />
     <input type="hidden" name="hidden_framework" id="hidden_framework" />
     <input type="submit" name="submit" class="btn btn-info" value="Submit" />
    </form>
    <br />

   </div>
  </div>
 </body>
</html>

<script>
$(document).ready(function(){
 $('.selectpicker').selectpicker();
})
</script>
