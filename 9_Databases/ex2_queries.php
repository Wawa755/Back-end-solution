<?php

    try {
        $db = new PDO('sqlite:chinook.sqlite');
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        //count tracks
        $totalTracksQuery = $db->query("SELECT COUNT(*) FROM tracks");
        $totalTrackCount = $totalTracksQuery->fetchColumn();

        //tracks with YOU in title
        //count
        $tracksWithYouQuery = $db->query("SELECT COUNT(*) FROM tracks WHERE Name LIKE '%you%'");
        $youTrackCount = $tracksWithYouQuery->fetchColumn();
        //list
        $tracksWithYouQuery = $db->query("SELECT Name FROM tracks WHERE Name LIKE '%you%'");
        $tracksWithYou = $tracksWithYouQuery->fetchAll(PDO::FETCH_ASSOC);

        //listing tracks with YOU and I
        $tracksWithYouAndIQuery = $db->query("SELECT Name FROM tracks WHERE Name LIKE '%you%' AND Name LIKE '%i%'");
        $tracksWithYouAndI = $tracksWithYouAndIQuery->fetchAll(PDO::FETCH_ASSOC);

        //count tracks with YOU and I in title & r linked to albums with words: CHRON, VOL
        $countTracksWithYouAndIInChronVolQuery = $db->query(
            "SELECT COUNT(*) FROM tracks 
            JOIN albums ON tracks.AlbumId = albums.AlbumId 
            WHERE tracks.Name LIKE '%you%' AND tracks.Name LIKE '%i%' 
            AND (albums.Title LIKE '%chron%' OR albums.Title LIKE '%vol%')"
        );
        $countTracksWithYouAndIInChronVol = $countTracksWithYouAndIInChronVolQuery->fetchColumn();
        //list
        $tracksAlbumsWithYouAndIInChronVolQuery = $db->query(
            "SELECT tracks.Name AS TrackName, albums.Title AS AlbumTitle FROM tracks 
            JOIN albums ON tracks.AlbumId = albums.AlbumId 
            WHERE tracks.Name LIKE '%you%' AND tracks.Name LIKE '%i%' 
            AND (albums.Title LIKE '%chron%' OR albums.Title LIKE '%vol%')"
        );
        $tracksAlbumsWithYouAndIInChronVol = $tracksAlbumsWithYouAndIInChronVolQuery->fetchAll(PDO::FETCH_ASSOC);

        //playlists with song "I put a spell on you"
        $playlistsWithSpellQuery = $db->query(
            "SELECT DISTINCT playlists.Name FROM playlists 
            JOIN playlist_track ON playlists.PlaylistId = playlist_track.PlaylistId 
            JOIN tracks ON playlist_track.TrackId = tracks.TrackId 
            WHERE tracks.Name LIKE 'I Put a Spell on You'"
        );
        $playlistsWithSpell = $playlistsWithSpellQuery->fetchAll(PDO::FETCH_ASSOC);

        //first playlist with...
        $firstPlaylistQuery = $db->query(
            "SELECT playlists.Name FROM playlists 
            JOIN playlist_track ON playlists.PlaylistId = playlist_track.PlaylistId 
            JOIN tracks ON playlist_track.TrackId = tracks.TrackId 
            WHERE tracks.Name LIKE 'I Put a Spell on You' 
            LIMIT 1"
        );
        $firstPlaylist = $firstPlaylistQuery->fetch(PDO::FETCH_ASSOC);
        
        //first playlist song names
        $songsInFirstPlaylist = [];
        if ($firstPlaylist) {
            $songsInFirstPlaylistQuery = $db->prepare(
                "SELECT tracks.Name FROM tracks 
                JOIN playlist_track ON tracks.TrackId = playlist_track.TrackId 
                JOIN playlists ON playlist_track.PlaylistId = playlists.PlaylistId 
                WHERE playlists.Name = ?"
            );
            $songsInFirstPlaylistQuery->execute([$firstPlaylist['Name']]);
            $songsInFirstPlaylist = $songsInFirstPlaylistQuery->fetchAll(PDO::FETCH_ASSOC);
        }

        $db = null;
    } catch (PDOException $e) {
        echo "Database connection failed: " . $e->getMessage();
    }
?>

<!DOCTYPE html>
<html>
<head>
    <title>Music chat queries</title>
</head>
<body>
    <p>Total number of tracks: <?= $totalTrackCount ?></p>
    <p>Number of tracks with 'you' in the title: <?= $youTrackCount ?></p>
    
    <h2>Tracks with 'you' in the title:</h2>
    <ul>
        <?php foreach ($tracksWithYou as $track): ?>
            <li><?= htmlspecialchars($track['Name']) ?></li>
        <?php endforeach; ?>
    </ul>
    
    <h2>Tracks with 'you' and 'i' in the title:</h2>
    <ul>
        <?php foreach ($tracksWithYouAndI as $track): ?>
            <li><?= htmlspecialchars($track['Name']) ?></li>
        <?php endforeach; ?>
    </ul>
    
    <p>Number of tracks with 'you' and 'i' in title linked to an album with 'chron' or 'vol': <?= $countTracksWithYouAndIInChronVol ?></p>
    
    <h2>Tracks and albums with 'you' and 'i' in title linked to 'chron' or 'vol':</h2>
    <ul>
        <?php foreach ($tracksAlbumsWithYouAndIInChronVol as $row): ?>
            <li>Track: <?= htmlspecialchars($row['TrackName']) ?> | Album: <?= htmlspecialchars($row['AlbumTitle']) ?></li>
        <?php endforeach; ?>
    </ul>

    <h2>Playlists containing 'I Put a Spell on You':</h2>
    <ul>
        <?php foreach ($playlistsWithSpell as $playlist): ?>
            <li><?= htmlspecialchars($playlist['Name']) ?></li>
        <?php endforeach; ?>
    </ul>

    <h2>First playlist containing 'I Put a Spell on You':</h2>
    <p><?= $firstPlaylist['Name'] ?? 'No playlist found' ?></p>

    <h2>Songs in the first playlist:</h2>
    <ol>
        <?php foreach ($songsInFirstPlaylist as $song): ?>
            <li><?= htmlspecialchars($song['Name']) ?></li>
        <?php endforeach; ?>
    </ol>
</body>
</html>
