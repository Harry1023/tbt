<div class="column is-hidden-mobile is-one-quarter has-background-white" style="border-right: 1px solid rgba(0,0,0,0.05); height: 100vh;">


<div class="block mt-4">
<aside class="menu p-2">
  <p class="menu-label">General</p>
  <ul class="menu-list">
    <li><a class="is-active" href="dashboard">Dashboard</a></li>
    <li><a>Notifications</a></li>
    <li><a>Assignments</a></li>
  </ul>
  <p class="menu-label">Advanced</p>
  <ul class="menu-list">
    <li><a href="user-roles">User Roles</a></li>
    <li><a href="control-panel">Settings</a></li>
  </ul>


</aside>


 <button class="button button-bottom is-fullwidth is-danger m-2" hx-get="api/users.php?logout" hx-trigger="click">Log Out</button>
</div>


</div>

<!-- Dynamic Side Menu ---->