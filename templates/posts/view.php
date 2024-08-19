<?php echo $this->Form->create($post);?>

<head>
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link id="theme-stylesheet" href="light-mode.css" rel="stylesheet">
    <link href="/css/home.css" rel="stylesheet">
</head>
<body class="light-mode">
    <div class="background-color-changer">
        <div class="cont" >

<fieldset style="max-width: 20rem; margin-left: calc(50% - 10rem);">
    <div class="card border-light mb-3" style="max-width: 20rem; margin-left: calc(50% - 10rem); margin-top: 50px;">
      <div class="card-body">
        <h4 class="card-title"><legend>New Listing</legend></h4>
        <div class="form-group">
                <p><?php echo $post->username;?></p>
                <p><?php echo $post->address;?></p>
                <p><?php echo $post->city;?></p>
                <p><?php echo $post->state;?></p>
                <p><?php echo $post->zipCode;?></p>
                <p><?php echo $post->price;?></p>
                <p><?php echo $post->bedrooms;?></p>
                <p><?php echo $post->bathrooms;?></p>

            </div>
            <?php echo $this->html->link('Back', '/posts?town=&bedrooms=&bathrooms=&zip=&max_price=', ['class'=>'btn btn-primary'], ['action'=>'index']);?>

      </div>
    </div>
    </fieldset>
   </div>
  </div>



<?php echo $this->Form->end();?>
