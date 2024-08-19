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
                <div class="col-lg-10">
                  <?php
                  echo $this->Form->input('username', ['class'=>'form-control', 'Placeholder'=>'Username']);
                  ?>
                </div>
            </div>

            <div class="form-group">
                <div class="col-lg-10">
                  <?php
                  echo $this->Form->input('address', ['class'=>'form-control', 'Placeholder'=>'Address']);
                  ?>
                </div>
            </div>

            <div class="form-group">
                <div class="col-lg-10">
                  <?php
                  echo $this->Form->input('city', ['class'=>'form-control', 'Placeholder'=>'City']);
                  ?>
                </div>
            </div>

            <div class="form-group">
                <div class="col-lg-10">
                  <?php
                  echo $this->Form->input('state', ['class'=>'form-control', 'Placeholder'=>'State']);
                  ?>
                </div>
            </div>

            <div class="form-group">
                <div class="col-lg-10">
                  <?php
                  echo $this->Form->input('zipCode', ['class'=>'form-control', 'Placeholder'=>'Zip Code']);
                  ?>
                </div>
            </div>

            <div class="form-group">
                <div class="col-lg-10">
                  <?php
                  echo $this->Form->input('price', ['class'=>'form-control', 'Placeholder'=>'Price']);
                  ?>
                </div>
            </div>

            <div class="form-group">
                <div class="col-lg-10">
                  <?php
                  echo $this->Form->input('bedrooms', ['class'=>'form-control', 'Placeholder'=>'Bedrooms']);
                  ?>
                </div>
            </div>

            <div class="form-group">
                <div class="col-lg-10">
                  <?php
                  echo $this->Form->input('bathrooms', ['class'=>'form-control', 'Placeholder'=>'Bathrooms']);
                  ?>
                </div>
            </div>
            <?php echo $this->Form->button(__('New Listing'), ['class'=>'btn btn-primary']);?>
            <?php echo $this->html->link('Back', '/posts?town=&bedrooms=&bathrooms=&zip=&max_price=', ['class'=>'btn btn-primary'], ['action'=>'index']);?>

      </div>
    </div>
    </fieldset>
   </div>
  </div>



<?php echo $this->Form->end();?>
