<?php
$iframeContent = '';
$listContent = '';

function showList($dir) {
    $phpFiles = glob($dir . '/*.php');
    if ($phpFiles) {
        $list = "<ul>";
        foreach ($phpFiles as $file) {
            $filename = basename($file);
            $list .= '<li>' . $filename . '</li>'; // Display filename without link
        }
        $list .= "</ul>";
        return $list;
    } else {
        return "<p>No PHP files found in the directory.</p>";
    }
}

if (isset($_GET['link'])) {
    switch ($_GET['link']) {
        case 'course':
            $iframeContent = '<iframe src="back-end_api_development.pdf" width="1000" height="750"></iframe>';
            break;
        case 'examples':
            $listContent = showList('examples');
            break;
        case 'assignments':
            $listContent = showList('assignments');
            break;
        default:
            $iframeContent = '';
            $listContent = '';
            break;
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

    
</body>
</html>