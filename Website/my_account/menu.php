<script>
</script>

<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
.vertical-menu {
  width: 200px;
}

.vertical-menu a {
  background-color: #eee;
  color: black;
  display: block;
  padding: 12px;
  text-decoration: none;
}

.vertical-menu a:hover {
  background-color: #ccc;
}

.vertical-menu a.active {
  background-color: #4CAF50;
  color: white;
}
</style>
</head>
<body>

<div class="vertical-menu">
  <a href="manage_tenants.php" class="active">Manage Tenants</a>
  <a href="#" onClick="overdue_tenant()">Overdue Tenants</a>
  <a href="#" onClick="upcoming_tenants()">Upcoming Tenants</a>
  <a href="manage_tenants.php">Manage Tenants</a>
  <a href="#">Others</a>
</div>

</body>
</html>