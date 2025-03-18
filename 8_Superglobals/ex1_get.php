<?php
$article1 = array(
    'title' => 'The actor who inspired Homer Simpsons "Doh!"',
    'date' => '12.2.2025.',
    'content' => "
    James Finlayson failed to make it as a lead man in Holywood but became one of the most memorable comic foils ever to grace the silver screen.
    The Scottish actor performed in more than 100 films but was best known for being the ''third man'' to Laurel and Hardy.
    With his distinctive fake moustache, he starred with the iconic duo in 33 of their films and later became the inspiration for Homer Simpson's ''D'oh!'' catchphrase.
    Now Finlayson has been memorialised with a new portrait in the Scottish theatre where he first tread the boards more than a century ago.
    Dobbie Hall in his hometown of Larbert, Stirling, commissioned the oil painting to celebrate the actor's career and rise to international fame in the early days of cinema.
    The portrait by young artist Connor Draycott was unveiled by Finlayson's family.
    They were joined by fans of the black and white movies and ''talkies'' from the UK chapters of Sons of the Desert, named after the fictional lodge that Laurel and Hardy belonged to in the 1933 film of the same name.
    ",
    'image' => 'img/img1.webp',
    'imageDescription' => 'article 1'
);

$article2 = array(
    'title' => 'Camera club celebrates 50 years of helping artists',
    'date' => '10.2.2025.',
    'content' => "
    A camera club supporting local photographers of all abilities is celebrating its 50th anniversary.
    Mid Somerset Camera Club meets every Tuesday in Street - and has done for decades.
    In 1974, workers from Somerset-based shoe manufacturer Clarks came together so that they could purchase camera film in bulk.
    The club has since evolved and now runs weekly sessions, exhibitions and competitions.
    '' Covid, we ran virtual meetings,'' said John Law, the club's chairman.
    ''We provided a useful lifeline to the outside world and our members appreciated the human contact and friendship we provided.''
    New member Charlotte Cobb joined the club because she wanted to take her photography more seriously.
    ",
    'image' => 'img/img2.webp',
    'imageDescription' => 'article 2'
);

$article3 = array(
    'title' => 'Flames, feathers and fangs: Rio Carnival parade in pictures',
    'date' => '8.2.2025.',
    'content' => "
    Thousand gathered at the citys giant Sambadrome arena to watch the top 12 samba schools battle it out for this years title...
    Beija-Flor was crowned winner on Wednesday for the 15th time, narrowly beating second-placed Grande Rio.
    Its performance was an homage to its late director, Luiz Fernando Ribeiro do Carmo, better known as Laíla, who died in June 2021 with Covid-19.
    While the overarching theme of Beija-Flor's parade was a tribute to its late director, it also featured floats with pyrotechnic displays and dancers dressed as devils.
    The performances are judged over 10 categories by a total of 40 judges.
    One of the top 12 samba schools competing for the title was Paraíso do Tuiuti, whose dancers paraded in exuberant feathers.
    ",
    'image' => 'img/img3.webp',
    'imageDescription' => 'article 3'
);

$articles = [$article1, $article2, $article3];

$article = null;
$pageTitle = "Today's newspaper";
$articleContent = null;
$showReadMore = true;
$showOverview = true;

if (isset($_GET['id'])) {
    if (isset($articles[$_GET['id']])) {
        $article = $articles[$_GET['id']];
        $pageTitle = $article['title'];
        $articleContent = $article['content'];
        $showReadMore = false;
        $showOverview = false;
    }
}

//Searchbar
$searchResults = [];
$searchMessage = null;

if (isset($_GET['search'])) {
    $searchTerm = strtolower($_GET['search']);
    $found = false;

    foreach ($articles as $key => $article) {
        if (strpos(strtolower($article['content']), $searchTerm) !== false || strpos(strtolower($article['title']), $searchTerm) !== false) {
            $searchResults[] = ['article' => $article, 'id' => $key];
            $found = true;
        }
    }

    if (!$found) {
        $searchMessage = "The search term '" . htmlspecialchars($searchTerm) . "' does not appear in our newspaper.";
    }
    $showOverview = false;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $pageTitle ?></title>
    
</head>

<body>
    <?php if ($showOverview) : ?>
        <h1><?= $pageTitle ?></h1>

        <div class="searchbar">
            <form action="ex1_get.php" method="get">
                <input type="text" name="search" placeholder="Search articles...">
                <button type="submit">Search</button>
            </form>
        </div>
    <?php endif; ?>

    <?php if (isset($_GET['search'])) : ?>
        <?php if ($searchMessage) : ?>
            <p><?= $searchMessage ?></p>
        <?php else : ?>
            <h2>Search Results:</h2>
            <div class="article-container">
                <?php foreach ($searchResults as $result) : ?>
                    <?php $article = $result['article']; $id = $result['id']; ?>
                    <div class="article">
                        <h2><?= $article['title'] ?></h2>
                        <p>Date: <?= $article['date'] ?></p>
                        <img src="<?= $article['image'] ?>" alt="<?= $article['imageDescription'] ?>">
                        <p><?= substr($article['content'], 0, 50) . '...' ?></p>
                        <button><a href="ex1_get.php?id=<?= $id ?>">Read more</a></button>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

    <?php elseif (!$showOverview && $articleContent !== null) : ?>
        <div class="article">
            <h2><?= $article['title'] ?></h2>
            <p>Date: <?= $article['date'] ?></p>
            <?php
            $paragraphs = explode("\n\n", htmlspecialchars($articleContent));
            foreach ($paragraphs as $paragraph) {
                echo '<p>' . trim(nl2br($paragraph)) . '</p>';
            }
            ?>
            <img src="<?= $article['image'] ?>" alt="<?= $article['imageDescription'] ?>">
        </div>
        <button> <p><a href="ex1_get.php">Back to overview</a></p></button>

    <?php else : ?>
        <div class="article-container">
            <?php foreach ($articles as $key => $article) : ?>
                <div class="article">
                    <h2><?= $article['title'] ?></h2>
                    <p>Date: <?= $article['date'] ?></p>
                    <img src="<?= $article['image'] ?>" alt="<?= $article['imageDescription'] ?>">
                    <p><?= substr($article['content'], 0, 50) . '...' ?></p>
                    <button><a href="ex1_get.php?id=<?= $key ?>">Read more</a></button>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>


    <style>
        *{
            font-family: Arial, "Helvetica Neue", Helvetica, sans-serif;
        }

        .searchbar{
            margin-top: 10px;
            margin-bottom: 10px;
        }

        img {
            width: 100%;
            height: auto;
            display: block;
            margin-bottom: 5px;
        }

        button{
            background-color: black;
            color: white;
            border: none;
            padding: 5px;
            border-radius: 7px;
            cursor: pointer;
        }

        a{
            color: white;
            text-decoration: none;
        }

        .article-container {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }

        .article {
            flex: 1 0 calc(33.33% - 20px);
            margin-bottom: 20px;
            padding: 15px;
            box-sizing: border-box;
            background-color: #ccc;
            border-radius: 20px;
        }
        .article h2 {
            margin-top: 0;
            font-size: 1.2em;
            margin-bottom: 5px;
        }
        .article p {
            font-size: 0.9em;
            line-height: 1.4;
            margin-bottom: 10px;
        }

        <?php if (!$showOverview && $articleContent !== null) : ?>
            .article {
                flex: 0 0 auto;
                width: 80%;
                margin: 20px auto;
            }
        <?php endif; ?>
    </style>
</body>
</html>