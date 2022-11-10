
<style>
  @import url('https://fonts.googleapis.com/css?family=Fredoka+One&display=swap');
@import url('https://fonts.googleapis.com/css?family=Courgette&display=swap');



.grid {
  display: grid;
  grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
  grid-gap: 20px;
  align-items: stretch;
}

.grid  article {
  border: 1px solid #ccc;
  box-shadow: 2px 2px 6px 0px rgba(0, 0, 0, 0.3);
}

.grid article img {
  max-width: 100%;
}

.grid .text {
  padding: 20px;
  text-align: center;
}

.grid .text h3 {
  font-size: 1.4rem;
  font-family: 'Fredoka One', cursive;
}

.grid .text p {
  font-size: 0.9rem;
}

.grid .text p a {
  text-decoration: none;
  font-weight: bold;
  color: #555;
  font-family: 'Courgette', cursive;
}
</style>
<script>
  window.console = window.console || function(t) {};
</script>
<script>
  if (document.location.search.match(/type=embed/gi)) {
    window.parent.postMessage("resize", "*");
  }
</script>

<?php 
  $consulta=$conn->prepare("SELECT * FROM productos ");
 ?>
</head>
<body translate="no">
<div class="container">
<main class="grid">
<article>
<img src="imagenes/xdxd.webp" alt="tshirt photo">
<div class="text">
<h3>Police Unit K-9</h3>
<p>by <a href="https://teespring.com/stores/dog-lover-graphic-design">Dog Lover Graphic Design</a></p>
<p>Material: 4.3 oz., 13 colors are 100% combed ringspun cotton. Machine Wash Cold, Tumble Dry Low. Sizing offered: XS - 3XL</p>
<a href="https://teespring.com/fr/police-unit-k-9?cid=2759&page=1&pid=46&tsmac=store&tsmic=dog-lover-graphic-design" class="btn btn-primary btn-block">Agregar al Carrito</a>
</div>
</article>


</main>
</div>