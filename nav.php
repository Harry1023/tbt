<div class="is-fullwidth" style="border-bottom: 1px solid rgba(0,0,0,0.05);">

<div class="block p-2">
<div class="is-flex is-justify-content-space-between  is-align-items-center">



   <span class="icon">
  <i class="fa-solid fa-bars"></i>
</span>


<figure class="image is-48x48">
  <img class="is-rounded" src="https://bulma.io/assets/images/placeholders/128x128.png" />
</figure>


<label class="switch is-rounded is-small">
            <input type="checkbox" id="themeToggle" value="false" checked="">
            <span class="check"></span>
            <span class="control-label">Dark Mode</span>
          </label>


</div>
</div>

</div>


<!---- Top Dynamic Navigation ---->

<script>
const checkbox = document.getElementById("themeToggle");

// Load saved theme
const theme = localStorage.getItem("theme_preference");

if (theme === "dark") {
  document.documentElement.dataset.theme = "dark";
  checkbox.checked = true;
} else {
  document.documentElement.dataset.theme = "light";
  checkbox.checked = false;
}

// Save when checkbox changes
checkbox.addEventListener("change", () => {
  if (checkbox.checked) {
    document.documentElement.dataset.theme = "dark";
    localStorage.setItem("theme_preference", "dark");
  } else {
    document.documentElement.dataset.theme = "light";
    localStorage.setItem("theme_preference", "light");
  }
});
</script>