<html>

<head>
  <meta content="width=device-width, initial-scale=1" name="viewport" />
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?=$this->e($title) ?></title>
  <link rel="stylesheet" href="/css/header.css">
  <link rel="stylesheet" href="/css/home/home.css">
  <link rel="stylesheet" href="/css/blog/blog.css">
  <link rel="stylesheet" href="/css/blog/comments.css">
  <link rel="stylesheet" href="/css/auth/regForm.css">

</head>

<body>
  <header>
    <div class="header-container">
      <div class="burger-menu">
        <button>&#9776</button>
        <div class="drop-menu">
          <ul>
            <li><a href="<?='/home'?>">Home</a></li>
            <li><a href="<?='/blog/index'?>">Blogs</a></li>
            <li><a href="<?='/auth/regForm'?>">Sign in</a></li>
            <li><a href="<?='/auth/logForm'?>">Log in</a></li>
          </ul>
        </div>
      </div>
      <div class="left-panel">
        <ul>
          <li><a href="<?='/home'?>">Home</a></li>
          <li><a href="<?='/blog/index'?>">Blogs</a></li>
        </ul>
      </div>
      <div class="right-panel">
        <ul>
          <li><a href="<?='/auth/regForm'?>">Sign in</a></li>
          <li><a href="<?='/auth/logForm'?>">Log in</a></li>
        </ul>
      </div>
    </div>
  </header>
  <?=$this->section('content')?>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-color/2.1.2/jquery.color.min.js"></script>
  <script src="/js/header.js"></script>
  <?=$this->section('includes')?>
</body>

</html>