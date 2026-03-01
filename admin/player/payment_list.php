<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/admin/auth.php';

$sql = "SELECT py.*, p.player_id as p_code, p.fullname, t.name as team_name, s.meetings, s.price as base_price, l.name as loc_name 
        FROM payments py 
        JOIN players p ON py.player_id = p.id 
        LEFT JOIN teams t ON p.team_id = t.id 
        LEFT JOIN sessions s ON py.session_id = s.id 
        LEFT JOIN locations l ON s.location_code = l.code 
        ORDER BY py.id DESC";
$result = $conn->query($sql);
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
    <h2 class="htp-title">Payment List</h2>
  </div>
  
  
  
    <table id="allPayTable" class="display responsive nowrap">
        <thead>
            <tr>
                <th class="all">Invoice</th>
                <th class="min-tablet">Player Name</th>
                <th class="min-tablet">Info</th>
                <th class="min-tablet">Final Price</th>
                <th class="min-tablet">Payment Date</th>
                <th class="min-tablet">Status</th>
                <th class="all">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php while($row = $result->fetch_assoc()): ?>
            <tr>
                <td class="text-wrap"><span><?php echo $row['invoice_number']; ?></span></td>
                <td><?php echo $row['fullname']; ?></td>
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
                    <a title="Edit" class="btn btn-small" href="/admin/player/<?php echo $row['p_code']; ?>/payment/edit/<?php echo $row['id']; ?>/">Edit</a>
				  </div>
                </td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
    <script>
        $(document).ready(function() {
            $('#allPayTable').DataTable({ responsive: true, pageLength: 10, order: [[0, 'desc']] });
        });
    </script>
	
	

</div>
<?php require ($_SERVER['BMG'].'admin/module/footer.php')?>