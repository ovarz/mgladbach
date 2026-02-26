<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/admin/auth.php';

// Fetch Latest Players
$res_players = $conn->query("SELECT p.photo, p.fullname, t.name as team_name FROM players p LEFT JOIN teams t ON p.team_id = t.id ORDER BY p.id DESC LIMIT 5");

// Fetch Latest Payments (Waiting)
$res_payments = $conn->query("SELECT p.photo, p.fullname, t.name as team_name, py.status FROM payments py JOIN players p ON py.player_id = p.id LEFT JOIN teams t ON p.team_id = t.id WHERE py.status = 'waiting confirmation' ORDER BY py.id DESC LIMIT 5");
if($res_payments->num_rows == 0) {
    // Jika semua sudah bayar, tampilkan 5 latest payment apapun statusnya
    $res_payments = $conn->query("SELECT p.photo, p.fullname, t.name as team_name, py.status FROM payments py JOIN players p ON py.player_id = p.id LEFT JOIN teams t ON p.team_id = t.id ORDER BY py.id DESC LIMIT 5");
}

// Fetch Latest Attendance (Check-in but no check-out)
$res_absent = $conn->query("SELECT p.photo, p.fullname, t.name as team_name, 'Check-in' as status FROM attendances a JOIN players p ON a.player_id = p.id LEFT JOIN teams t ON p.team_id = t.id WHERE a.date = CURDATE() AND a.check_out_time IS NULL ORDER BY a.id DESC LIMIT 5");

// Fetch Latest Coaches
$res_coaches = $conn->query("SELECT c.photo, c.nickname, GROUP_CONCAT(t.name SEPARATOR '<br>') as team_name FROM coaches c LEFT JOIN teams t ON c.id = t.coach_id GROUP BY c.id ORDER BY c.id DESC LIMIT 5");
?>
<?php 
  $lang='en';
  $menu='Home';
  $site_title='default';
  require ($_SERVER['BMG'].'admin/module/meta.php')
?>
<?php require ($_SERVER['BMG'].'admin/module/sidebar.php')?>
<div class="rancak-main">



    <div>
        <h2>Latest Player</h2>
        <a href="/admin/player/"><button>View All</button></a>
        <ul>
            <?php while($row = $res_players->fetch_assoc()): ?>
                <li>
                    <img src="/assets/img/photos/<?php echo $row['photo'] ?: 'default.jpg'; ?>" width="50">
                    <br>Name: <?php echo $row['fullname']; ?>
                    <br>Team: <?php echo $row['team_name'] ?: 'No Team'; ?>
                </li>
            <?php endwhile; ?>
        </ul>
    </div>

    <div>
        <h2>Latest Payment</h2>
        <a href="/admin/player/payment/"><button>View All</button></a>
        <ul>
            <?php while($row = $res_payments->fetch_assoc()): ?>
                <li>
                    <br>Name: <?php echo $row['fullname']; ?>
                    <br>Team: <?php echo $row['team_name'] ?: 'No Team'; ?>
                    <br>Status: <?php echo $row['status']; ?>
                </li>
            <?php endwhile; ?>
        </ul>
    </div>

    <div>
        <h2>Latest Player Attendance</h2>
        <a href="/admin/player/"><button>View All</button></a>
        <ul>
            <?php if($res_absent->num_rows > 0): ?>
                <?php while($row = $res_absent->fetch_assoc()): ?>
                    <li>
                        <img src="/assets/img/photos/<?php echo $row['photo'] ?: 'default.jpg'; ?>" width="50">
                        <br>Name: <?php echo $row['fullname']; ?>
                        <br>Team: <?php echo $row['team_name'] ?: 'No Team'; ?>
                        <br>Status: <?php echo $row['status']; ?>
                    </li>
                <?php endwhile; ?>
            <?php else: ?>
                <li>Data belum tersedia</li>
            <?php endif; ?>
        </ul>
    </div>

    <div>
        <h2>Latest Coach</h2>
        <a href="/admin/coach/"><button>View All</button></a>
        <ul>
            <?php while($row = $res_coaches->fetch_assoc()): ?>
                <li>
                    <img src="/assets/img/photos/<?php echo $row['photo'] ?: 'default.jpg'; ?>" width="50">
                    <br>Name: <?php echo $row['nickname']; ?>
                    <br>Team(s): <br>
                    <div><?php echo $row['team_name'] ?: 'No Team'; ?></div>
                </li>
            <?php endwhile; ?>
        </ul>
    </div>
	
	
	
</div>
<?php require ($_SERVER['BMG'].'admin/module/footer.php')?>