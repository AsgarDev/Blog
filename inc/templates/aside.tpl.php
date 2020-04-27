<aside class="col-lg-3">
    <!-- Champ de recherche: https://getbootstrap.com/docs/4.1/components/input-group/ -->
    <div class="input-group mb-3">
        <input type="text" class="form-control" placeholder="Rechercher un article..."
        aria-label="Rechercher un article..." aria-describedby="basic-addon2">
        <div class="input-group-append">
        <button class="btn btn-outline-secondary" type="button">Allez</button>
        </div>
    </div>

    <!-- Catégories: https://getbootstrap.com/docs/4.1/components/card/#list-groups-->
    <div class="card">
        <h3 class="card-header">Catégories</h3>
        <ul class="list-group list-group-flush">
            <?php foreach($categoryList as $categoryId => $categoryObject) : ?>
            <li class="list-group-item">
                <a href="index.php?page=category&categoryId=<?= $categoryId ?>"><?= $categoryObject->name ?></a>
            </li>
            <?php endforeach ?>
        </ul>
    </div>

    <!-- Auteurs: https://getbootstrap.com/docs/4.1/components/card/#list-groups -->
    <div class="card">
        <h3 class="card-header">Auteurs</h3>
        <ul class="list-group list-group-flush">
            <?php foreach($authorList as $authorId => $authorObject) : ?>
            <li class="list-group-item">
                <a href="index.php?page=author&authorId=<?= $authorId ?>"><?= $authorObject->name ?></a>
            </li>
            <?php endforeach; ?>
        </ul>
    </div>

    </aside>