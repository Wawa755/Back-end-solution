<?php
$iframeContent = '';
$listContent = '';
$searchResult = ''; 

function showList($dir) {
    $files = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($dir));
    $phpFiles = [];
    foreach ($files as $file) {
        if ($file->isFile() && $file->getExtension() === 'php') {
            $phpFiles[] = $file->getPathname();
        }
    }

    if (!empty($phpFiles)) {
        $list = "<ul>";
        foreach ($phpFiles as $filepath) {
            $filename = basename($filepath);
            $list .= '<li><a href="' . $filepath . '">' . $filename . '</a></li>';
        }
        $list .= "</ul>";
        return $list;
    } else {
        return "<p>No PHP files found in the directory or its subdirectories.</p>";
    }
}

function searchFiles($searchTerm, $dir) {
    $files = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($dir));
    $results = [];
    foreach ($files as $file) {
        if ($file->isFile() && $file->getExtension() === 'php') {
            $filename = $file->getFilename();
            if (stripos($filename, $searchTerm) !== false) {
                $results[] = $file->getPathname();
            }
        }
    }
    return $results;
}

if (isset($_GET['link'])) {
    switch ($_GET['link']) {
        case 'course':
            $iframeContent = '<iframe src="back-end_api_development.pdf" width="1000" height="750"></iframe>';
            break;
        case 'examples':
            $listContent = showList('.');
            break;
        case 'assignments':
            $listContent = showList('.');
            break;
        default:
            $iframeContent = '';
            $listContent = '';
            break;
    }
}

if (isset($_GET['search'])) {
    $searchTerm = $_GET['search'];
    $searchResults = searchFiles($searchTerm, '.'); 
    if (!empty($searchResults)) {
        $searchResult = "<h2>Search results for: " . htmlspecialchars($searchTerm) . "</h2><ul>";
        foreach ($searchResults as $filepath) {
            $filename = basename($filepath);
            $searchResult .= '<li><a href="' . $filepath . '">' . $filename . '</a></li>';
        }
        $searchResult .= "</ul>";
    } else {
        $searchResult = "<p>No files found containing '" . htmlspecialchars($searchTerm) . "'.</p>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Revision 1</title>
</head>
<body>

    <h1>Index pages</h1>
    <nav>
        <ul>
            <li><a href="<?php echo $_SERVER['PHP_SELF']; ?>?link=course">Course</a></li>
            <li><a href="<?php echo $_SERVER['PHP_SELF']; ?>?link=examples">Examples</a></li>
            <li><a href="<?php echo $_SERVER['PHP_SELF']; ?>?link=assignments">Assignments</a></li>
        </ul>
    </nav>

    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="GET">
        <label for="search">Search:</label>
        <input type="text" id="search" name="search">
        <input type="submit" value="Submit">
    </form>

    <h1>Content</h1>

    <?php echo $iframeContent; ?>
    <?php echo $listContent; ?>
    <?php echo $searchResult; ?>

</body>
</html>