<?php
require 'database.php';

if($_SERVER['REQUEST_METHOD']=='POST')
{
    $name =$_POST['name'];
    $phone = $_POST['phone'];

    $statement =$pdo->prepare("INSERT INTO contacts (name, phone) VALUES (:name, :phone)");
    $statement->execute([
        'name' => $name,
        'phone' => $phone
    ]);
}

    $statement = $pdo->prepare("SELECT * FROM contacts");
    $statement->execute();
    $contacts = $statement->fetchAll();

    
    ?>
    <!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Contact Form</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
   
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
  <link rel="stylesheet" href="styles.css">
</head>
<body>
  <div class="contact-form">
    <form action="#" method="post">
      <div class="form-group">
        <h3 class="label font ">Добавить Контакт</h1>
        <input type="text" placeholder="Имя" id="name" name="name" required>
      </div>
      <div class="form-group">
        <label  for="phone"></label>
        <input type="tel" placeholder="Телефон" id="phone" name="phone" required>
      </div>
      <div class="form-group">
        <button class="btn-primary" type="submit">Добавить</button>
      </div>
    </form>
    <div class="row-4"> 
        <div class="col-md-4 order-md-2 mb-4">
          <h4 class="d-flex justify-content-between align-items-center mb-3">
            <span class="text-muted">Список контактов </span>

          <?php if(isset($_SESSION['contact-deleted'])):?>
         <div class="alert alert-info" role="alert">
        <?php $_SESSION['contact-deleted']?>
        <?php unset($_SESSION['contact-deleted']); ?>
        </div>
        <?php endif; ?>
            <span class="badge badge-secondary badge-pill">3</span>
          </h4>
          <ul class="list-group mb-3">
          <?php foreach($contacts as $contact): ?>
            <li class="list-group-item d-flex justify-content-between lh-condensed">
              <div>
              
                <h6 class="my-0"><?echo $contact['name']?></h6>
                <small class="text-muted"><? echo $contact['phone']?></small>
               
              </div>
        <form method="POST" action="delete.php">
            <input type="hidden" name="contact_id" value="<?php echo $contact['id']?>">
            <input type="hidden" name="DELETE">
            <button type="submit" class="text-muted">x</button>
        </form>

              
            </li>
            <?php endforeach; ?>
          </ul>

          </div>
  </div>
</body>
</html>
