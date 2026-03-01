<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/admin/auth.php';

$player_code = $conn->real_escape_string($_GET['id']);
$sql = "SELECT p.*, t.name as team_name, c.nickname as coach_name 
        FROM players p 
        LEFT JOIN teams t ON p.team_id = t.id 
        LEFT JOIN coaches c ON t.coach_id = c.id 
        WHERE p.player_id = '$player_code'";
$result = $conn->query($sql);
$player = $result->fetch_assoc();

if(!$player) die("Player not found.");

// Calculate Age
$bday = new DateTime($player['birthday']);
$today = new DateTime('today');
$age = $bday->diff($today)->y;

// Fetch Data for Tables
$pid = $player['id'];
$att_res = $conn->query("SELECT * FROM attendances WHERE player_id = $pid ORDER BY id DESC");
$pay_res = $conn->query("SELECT p.*, s.meetings, s.price as base_price, l.name as loc_name FROM payments p LEFT JOIN sessions s ON p.session_id = s.id LEFT JOIN locations l ON s.location_code = l.code WHERE p.player_id = $pid ORDER BY p.id DESC");
$rep_res = $conn->query("SELECT * FROM reports WHERE player_id = $pid ORDER BY id DESC");
?>
<?php 
  $lang='en';
  $menu='Player';
  $datatable='yes';
  require ($_SERVER['BMG'].'admin/module/meta.php')
?>
<?php require ($_SERVER['BMG'].'admin/module/sidebar.php')?>
<div class="rancak-main-container rancak-main-1column">



  <div class="head-top-page">
    <h2 class="htp-title"><?php echo $player['nickname']; ?></h2>
	<div class="htp-button-list">
      <a title="Edit Data" class="btn" href="/admin/player/<?php echo $player_code; ?>/edit/">Edit Data</a>
      <a title="Absent" class="btn" href="/admin/player/<?php echo $player_code; ?>/attendance/add/">Absent</a>
      <a title="Add Report" class="btn" href="/admin/player/<?php echo $player_code; ?>/report/add/">Add Report</a>
      <a title="Add Payment" class="btn" href="/admin/player/<?php echo $player_code; ?>/payment/add/">Add Payment</a>
	</div>
  </div>



  <div class="profile-bio profile-player white-box">
    <div class="profile-bio-picture content-center">
      <div class="profile-frame img-frame">
        <img class="lazyload" data-original="/admin/assets/img/photos/<?php echo $player['photo'] ?: 'default.png'; ?>">
      </div>
    </div>
	<ul class="profile-bio-info">
	  <li class="pbi-row">
	    <div class="pbi-label">Nickname</div>
	    <div class="pbi-data"><?php echo $player['nickname']; ?></div>
	  </li>
	  <li class="pbi-row">
	    <div class="pbi-label">Full Name</div>
	    <div class="pbi-data"><?php echo $player['fullname']; ?></div>
	  </li>
	  <li class="pbi-row">
	    <div class="pbi-label">Birthday</div>
	    <div class="pbi-data"><?php echo date('j F Y', strtotime($player['birthday'])); ?></div>
	  </li>
	  <li class="pbi-row">
	    <div class="pbi-label">Age</div>
	    <div class="pbi-data"><?php echo $age; ?> Years Old</div>
	  </li>
	  <li class="pbi-row">
	    <div class="pbi-label">WhatsApp</div>
	    <div class="pbi-data"><?php echo $player['whatsapp']; ?></div>
	  </li>
	  <li class="pbi-row">
	    <div class="pbi-label">Email</div>
	    <div class="pbi-data"><?php echo $player['email']; ?></div>
	  </li>
	</ul>
	<ul class="profile-bio-info">
	  <li class="pbi-row">
	    <div class="pbi-label">Player ID</div>
	    <div class="pbi-data"><?php echo $player['player_id']; ?></div>
	  </li>
	  <li class="pbi-row">
	    <div class="pbi-label">Join Date</div>
	    <div class="pbi-data"><?php echo date('j F Y', strtotime($player['join_date'])); ?></div>
	  </li>
	  <li class="pbi-row">
	    <div class="pbi-label">Teams</div>
	    <div class="pbi-data"><?php echo $player['team_name'] ?: 'No Team'; ?></div>
	  </li>
	  <li class="pbi-row">
	    <div class="pbi-label">Coach</div>
	    <div class="pbi-data"><?php echo $player['coach_name'] ?: 'No Coach'; ?></div>
	  </li>
	</ul>
  </div>
  
  
  
  <section title="Attendance Section" class="section-container">
    <h2 class="section-title">Attendance Section</h2>
    <table id="attTable" class="display responsive nowrap">
        <thead>
            <tr>
                <th class="all">Date</th>
                <th class="min-tablet">Check-In</th>
                <th class="min-tablet">Check-Out</th>
                <th class="min-tablet">Submit By</th>
                <th class="all">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php while($row = $att_res->fetch_assoc()): ?>
            <tr>
                <td><?php echo date('j F Y', strtotime($row['date'])); ?></td>
                <td><?php echo $row['check_in_time']; ?></td>
                <td><?php echo $row['check_out_time'] ?: '<span class="alert-text">Not Checked Out</span>'; ?></td>
                <td><?php echo $row['submit_by'] ? ucwords($row['submit_by']) : '-'; ?></td>
                <td>
				  <?php if(!$row['check_out_time']): ?>
                    <div class="datatable-action">
                      <a title="Check-out" class="btn btn-small" href="/admin/player/<?php echo $player_code; ?>/attendance/add/">Check-out</a>
                    </div>
				  <?php endif; ?>
                </td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
  </section>



  <section title="Payment Section" class="section-container">
    <h2 class="section-title">Payment Section</h2>
    <table id="payTable" class="display responsive nowrap">
        <thead>
            <tr>
                <th class="all">Invoice</th>
                <th class="min-tablet">Info</th>
                <th class="min-tablet">Price</th>
                <th class="min-tablet">Payment Date</th>
                <th class="min-tablet">Status</th>
                <th class="all">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php while($row = $pay_res->fetch_assoc()): ?>
            <tr>
                <td class="text-wrap"><span><?php echo $row['invoice_number']; ?></span></td>
                <td>
				  <div class="column-content-list">
                    <div><?php echo $row['month'] . ' ' . $row['year']; ?></div>
                    <div><?php echo $row['loc_name'] . ' - ' . $row['meetings'] . ' session'; ?></div>
				  </div>
				</td>
                <td><?php echo ($row['base_price'] - $row['discount']); ?></td>
                <td><?php echo date('j F Y', strtotime($row['payment_date'])); ?></td>
                <td><div aria-status="<?php echo $row['status']; ?>"><?php echo $row['status']; ?></div></td>
                <td>
                  <div class="datatable-action">
                    <a title="Edit" class="btn btn-small" href="/admin/player/<?php echo $player_code; ?>/payment/edit/<?php echo $row['id']; ?>/">Edit</a>
                  </div>
				</td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
  </section>



  <section title="Report Section" class="section-container">
    <h2 class="section-title">Report Section</h2>
    <table id="repTable" class="display responsive nowrap">
        <thead>
            <tr>
                <th class="all">Report Title</th>
                <th class="min-tablet">Team</th>
                <th class="min-tablet">Overall</th>
                <th class="all">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php while($row = $rep_res->fetch_assoc()): ?>
            <tr>
                <td><?php echo ucwords(str_replace('-', ' ', $row['report_link'])); ?></td>
                <td><?php echo $player['team_name'] ?: '-'; ?></td>
                <td><?php echo $row['overall']; ?></td>
                <td>
                  <div class="datatable-action">
                    <a title="Detail" class="btn btn-small" href="/admin/player/<?php echo $player_code; ?>/<?php echo $row['report_link']; ?>/">Detail</a>
                  </div>
				</td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
  </section>

    <script>
        $(document).ready(function() {
            $('#attTable').DataTable({ responsive: true, pageLength: 10, order: [[0, 'desc']] });
            $('#payTable').DataTable({ responsive: true, pageLength: 10, order: [[0, 'desc']] });
            $('#repTable').DataTable({ responsive: true, pageLength: 10, order: [[0, 'desc']] });
        });
    </script>
	
	

</div>
<?php require ($_SERVER['BMG'].'admin/module/footer.php')?>