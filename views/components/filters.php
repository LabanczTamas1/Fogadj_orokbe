<div class="filter-container" style="border-top:0px solid black;">
                <select id="continent" class="filter-select" name="select">
                <option value="0">Összes Kontinens</option>
                <?php foreach ($continents->all() as $continent) : ?>
                <option value="<?= $continent->id ?>" class="dropdown-text"><?= $continent->continent_name ?></option>
                <?php endforeach ?>
                </select>

            <label for="country">Ország: </label>
            <input type="text" id="country" class="search-input" placeholder="Search...">

            <label for="city">Város: </label>
            <input type="text" id="city" class="search-input" placeholder="Search...">
</div>