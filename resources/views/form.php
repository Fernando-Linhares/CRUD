<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>   
</head>
<body>
<nav class="nav-extended black">
    <div class="nav-wrapper">
        <div class="container">
            <a href="/" class="brand-logo"><i class="Large material-icons">ac_unit</i> CRUD</a>
            <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
            <ul id="nav-mobile" class="right hide-on-med-and-down">
                <li><span class="white-text">create</span><a class="btn white black-text" href="create"><i class="Large material-icons">arrow_upward</i></a></li>
            </ul>
        </div>
    </div>
 </nav>
 <?php
$res =(array)$_GET['data'];

 ?>
 <div class="container">
    <div class="card-panel">
        <div class="row">
            <form action="<?= isset($res[0]->id)?"edit/product":"create/product" ?>" method="post" class="col s12">
            <div class="row">
                <div class="input-field col s12">
                    <input id="name" type="text" name="name" value="<?= isset($res[0]->name)?$res[0]->name:""; ?>">
                    <label for="name">name</label>
                </div>
                <div class="input-field col s12">
                    <input id="price" type="number" name="price" value="<?= isset($res[0]->price)?$res[0]->price:""; ?>">
                    <label for="price">price</label>
                </div>
                <div class="input-field col s12">
                    <input id="price" type="text" name="cat" value="<?= isset($res[0]->cat)?$res[0]->cat:""; ?>">
                    <label for="price">categorie</label>
                </div>
                <input type="hidden" name="id" value="<?= isset($res[0]->id)?$res[0]->id:''; ?>">
                <div class="col s12">
                    <button type="submit" class="btn blue">
                        Send
                    </button>
                </div>
            </div>
            </form>
        </div>
    </div>
 </div>
 <footer class="page-footer black">
          <div class="container">
            <div class="row">
              <div class="col l6 s12">
                <h5 class="white-text"><i class="Large material-icons">ac_unit</i>CRUD</h5>
                <p class="grey-text text-lighten-4">Documentation on github</p>
              </div>
              <div class="col l4 offset-l2 s12">
                <h5 class="white-text">contacts</h5>
                <ul>
                  <li><a class="grey-text text-lighten-3" href="https://www.github.com/Fernando-Linhares/Crud">link</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="footer-copyright">
            <div class="container">
            © https://www.github.com/Fernando-Linhares/Crud
            <a class="grey-text text-lighten-4 right" href="https://www.github.com/Fernando-Linhares/Crud">github</a>
            </div>
          </div>
        </footer>
</body>
</html>