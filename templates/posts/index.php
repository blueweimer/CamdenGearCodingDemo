<head>
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link id="theme-stylesheet" href="light-mode.css" rel="stylesheet">
    <link href="/css/home.css" rel="stylesheet">
</head>
<body class="light-mode">
    <div class="background-color-changer">
        <div class="cont">
            <div class="theme-switch-wrapper">
                <label class="theme-switch" for="checkbox">
                    <input type="checkbox" id="checkbox">
                    <div class="slider round"></div>
                </label>
            </div>

            <div class="row">
                <?php echo $this->Flash->render('message'); ?>
                <?php echo $this->Html->link('New Listing', ['action' => 'add'], ['class' => 'btn btn-primary']); ?>
                <p></p>

                <form id="filter-form" class="d-flex mb-4" method="get" action="<?php echo $this->Url->build(['action' => 'index']); ?>">

                    <select class="form-select me-sm-2" name="town">
                            <option value="">towns</option>
                            <!-- Populate with towns from your database -->
                            <?php foreach ($towns as $townOption) : ?>
                                <option value="<?php echo h($townOption); ?>" <?php echo isset($town) && $town == $townOption ? 'selected' : ''; ?>>
                                    <?php echo h($townOption); ?>
                                </option>
                            <?php endforeach; ?>
                        </select>

                    <select class="form-select me-sm-2" name="bedrooms">
                        <option value="">bedrooms</option>
                        <option value="1" <?php echo isset($bedrooms) && $bedrooms == 1 ? 'selected' : ''; ?>>1</option>
                        <option value="2" <?php echo isset($bedrooms) && $bedrooms == 2 ? 'selected' : ''; ?>>2</option>
                        <!-- Add more options as needed -->
                    </select>

                    <select class="form-select me-sm-2" name="bathrooms">
                        <option value="">bathrooms</option>
                        <option value="1" <?php echo isset($bathrooms) && $bathrooms == 1 ? 'selected' : ''; ?>>1</option>
                        <option value="4" <?php echo isset($bathrooms) && $bathrooms == 4 ? 'selected' : ''; ?>>4</option>
                        <!-- Add more options as needed -->
                    </select>

                    <select class="form-select me-sm-2" name="zip">
                        <option value="">zip codes</option>
                        <!-- Populate with zip codes from your database -->
                        <?php foreach ($zipCodes as $code) : ?>
                            <option value="<?php echo h($code); ?>" <?php echo isset($zip) && $zip == $code ? 'selected' : ''; ?>>
                                <?php echo h($code); ?>
                            </option>
                        <?php endforeach; ?>
                    </select>

                    <input class="form-control me-sm-2" type="number" name="max_price" placeholder="Max Price" value="<?php echo isset($maxPrice) ? h($maxPrice) : ''; ?>">

                    <button class="btn btn-primary my-2 my-sm-0" type="submit">Filter</button>
                    <button type="button" class="btn btn-warning my-2 my-sm-0 ms-2" onclick="clearFilters()">Clear</button>
                </form>


                <!-- Selected Filters Display -->
                <div id="selected-filters" class="mb-4"></div>

                <!-- Table View -->
                <h2 style="margin-top: 100px; margin-bottom: 50px; text-align: center;">Table View: </h2>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">id</th>
                            <th scope="col">username</th>
                            <th scope="col">address</th>
                            <th scope="col">city</th>
                            <th scope="col">state</th>
                            <th scope="col">zipCode</th>
                            <th scope="col">price</th>
                            <th scope="col">bedrooms</th>
                            <th scope="col">bathrooms</th>
                            <th scope="col">action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($posts)) : ?>
                            <?php foreach ($posts as $post) : ?>
                                <tr class="table-light">
                                    <th scope="row"><?php echo $post->id; ?></th>
                                    <td><?php echo $post->username; ?></td>
                                    <td><?php echo $post->address; ?></td>
                                    <td><?php echo $post->city; ?></td>
                                    <td><?php echo $post->state; ?></td>
                                    <td><?php echo $post->zipCode; ?></td>
                                    <td><?php echo $post->price; ?></td>
                                    <td><?php echo $post->bedrooms; ?></td>
                                    <td><?php echo $post->bathrooms; ?></td>
                                    <td>
                                        <?php echo $this->html->link('View', ['action' => 'view', $post->id], ['class' => 'btn btn-primary']); ?>
                                        <?php echo $this->html->link('Edit', ['action' => 'edit', $post->id], ['class' => 'btn btn-success']); ?>
                                        <?= $this->Form->postLink('Delete', ['action' => 'delete', $post->id], ['class' => 'btn btn-danger'], ['confirm' => 'Are you sure?']); ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <tr>
                                <td colspan="10">No results found</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>


                <!-- Card View -->

                <?php if (!empty($posts)) : ?>
                    <h2 style="margin-top: 100px; margin-bottom: 50px; text-align: center;">Card View: </h2>
                    <?php foreach ($posts as $post) : ?>
                    <div class="individual-cards">
                    <div class="card card-two mb-3">
                      <svg xmlns="http://www.w3.org/2000/svg" class="d-block user-select-none" width="0" height="0" aria-label="Placeholder: Image cap" focusable="false" role="img" preserveAspectRatio="xMidYMid slice" viewBox="0 0 318 180" style="font-size:1.125rem;text-anchor:middle; overflow: hidden;">
                          <img style="width:100%; height:100%; object-fit:cover; overflow: hidden;" src=<?php echo $post->picture; ?> alt="real-estate picture" />
                      </svg>
                      <h3 class="card-header"><?php echo $post->id; ?></h3>
                      <div class="card-body individual-cards-inside">
                        <h5 class="card-title"><?php echo $post->address; ?></h5>
                        <h6 class="card-subtitle text-muted"><?php echo $post->city; ?></h6>
                        <h6 class="card-subtitle text-muted"><?php echo $post->state; ?></h6>
                        <h6 class="card-subtitle text-muted"><?php echo $post->zipCode; ?></h6>
                        <h6 class="card-subtitle text-muted"><?php echo $post->username; ?></h6>
                      </div>
                      <div class="card-body">
                        <h6>number of bedrooms: <?php echo $post->bedrooms; ?></h6>
                        <h6>number of bathrooms: <?php echo $post->bathrooms; ?></h6>
                        <tr class="table-light">
                            <td style="text-align: center; padding-left: 40px; width: 100px;">
                                <?php echo $this->html->link('View', ['action' => 'view', $post->id], ['class' => 'btn btn-primary']); ?>
                                <?php echo $this->html->link('Edit', ['action' => 'edit', $post->id], ['class' => 'btn btn-success']); ?>
                                <?= $this->Form->postLink('Delete', ['action' => 'delete', $post->id], ['class' => 'btn btn-danger'], ['confirm' => 'Are you sure?']); ?>
                            </td>
                        </tr>
                      </div>
                      <ul class="list-group list-group-flush">
                        <li class="list-group-item">$<?php echo $post->price; ?></li>
                      </ul>
                    </div>
                      <div class="card-body">
                    </div>
                    </div>

                <?php endforeach; ?>
                    <?php else : ?>
                        <tr>
                            <td colspan="10">No results found</td>
                        </tr>
                    <?php endif; ?>

            </div>
        </div>
    </div>

    <script>
        const checkbox = document.getElementById('checkbox');
        checkbox.addEventListener('change', () => {
            document.body.classList.toggle('dark-mode', checkbox.checked);
            document.body.classList.toggle('light-mode', !checkbox.checked);
            localStorage.setItem('theme', checkbox.checked ? 'dark' : 'light');
        });

        document.addEventListener('DOMContentLoaded', () => {
            const savedTheme = localStorage.getItem('theme');
            if (savedTheme) {
                checkbox.checked = savedTheme === 'dark';
                document.body.classList.toggle('dark-mode', savedTheme === 'dark');
                document.body.classList.toggle('light-mode', savedTheme === 'light');
            }
            updateSelectedFilters();
        });

        function submitFilterForm() {
            document.getElementById('filter-form').submit();
        }

        function updateSelectedFilters() {
            const townSelect = document.querySelector('select[name="town"]');
            const bedroomsSelect = document.querySelector('select[name="bedrooms"]');
            const bathroomsSelect = document.querySelector('select[name="bathrooms"]');
            const zipSelect = document.querySelector('select[name="zip"]');
            const maxPriceInput = document.querySelector('input[name="max_price"]').value;

            const selectedTown = townSelect.options[townSelect.selectedIndex].text;
            const selectedBedrooms = bedroomsSelect.options[bedroomsSelect.selectedIndex].text;
            const selectedBathrooms = bathroomsSelect.options[bathroomsSelect.selectedIndex].text;
            const selectedZip = zipSelect.options[zipSelect.selectedIndex].text;

            let filterText = 'SELECTED FILTERS -- ';

            filterText += `${selectedTown !== 'towns' ? 'Towns: ' + selectedTown + ' -- ' : ''}`;
            filterText += `${selectedBedrooms !== 'bedrooms' ? 'Bedrooms: ' + selectedBedrooms + ' -- ' : ''}`;
            filterText += `${selectedBathrooms !== 'bathrooms' ? 'Bathrooms: ' + selectedBathrooms + ' -- ' : ''}`;
            filterText += `${selectedZip !== 'zip codes' ? 'Zip Codes: ' + selectedZip + ' -- ' : ''}`;
            filterText += `${maxPriceInput !== '' ? 'Max Price: ' + maxPriceInput : ''}`;

            document.getElementById('selected-filters').textContent = filterText;
        }




        function clearFilters() {
            document.querySelector('select[name="town"]').selectedIndex = 0;
            document.querySelector('select[name="bedrooms"]').selectedIndex = 0;
            document.querySelector('select[name="bathrooms"]').selectedIndex = 0;
            document.querySelector('select[name="zip"]').selectedIndex = 0;
            document.querySelector('input[name="max_price"]').value = "max price";
            updateSelectedFilters();
            document.getElementById('filter-form').submit();
        }
    </script>
</body>
