<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>   
</head>
<body>
<nav class="nav-extended black">
    <div class="nav-wrapper">
        <div class="container">
            <a href="/" class="brand-logo"><i class="Large material-icons">ac_unit</i> CRUD</a>
            <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
            <ul id="nav-mobile" class="right hide-on-med-and-down">
                <li><span class="white-text">create</span><a class="btn white black-text" href="/create"><i class="Large material-icons">arrow_upward</i></a></li>
            </ul>
        </div>
    </div>
 </nav>
 <div class="container">
    <div class="card-panel">
    <?php if(isset(current($_GET['data'])->id)):?>
        <table class="striped">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Categorie</th>
                    <th>--</th>
                </tr>
                </thead>

                <tbody>
                <?php foreach($_GET['data'] as $product):?>

                <tr>
                    <td>
                        <?= $product->id; ?>
                    </td>
                    <td>
                        <?=$product->name;?>
                    </td>
                    <td>
                    <?= $product->price;?>
                    </td>
                    <td>
                        <?= $product->cat;?>
                    </td>
                    <td>
                        <form action="edit" method="post">
                            <input type="hidden" name="id" value="<?= $product->id; ?>">
                            <button type="submit" class="btn blue"><i class="material-icons">create</i></button>
                        </form>
                        <form id="delete" action="delete" method="post">
                            <input type="hidden" name="id" value="<?= $product->id; ?>">
                            <button type="submit" class="btn red"><i class="material-icons">delete</i></button>
                        </form>
                    </td>
                </tr>
                <?php endforeach;?>
            </table>
            <?php else: ?>
            <div class="row">
                <h5 class="col s12">Include products</h5>
                <div class="col s6">create a new product</div>
                <div class="col s6">
                    <a href="create" class="btn"><i class="material-icons">add</i></a>   
                </div>
            </div>

            <?php endif;?>
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
            
 </div>
</body>
</html>