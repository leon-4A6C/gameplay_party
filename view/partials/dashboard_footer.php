        </div>
    <div class="column is-1">
        <!-- random side bar -->
    </div>
</div>


<script>
document.querySelectorAll("aside.menu .menu-list li a").forEach(x => {
    if(x.href === location.href) {
        x.classList.add("is-active")
        let menu = x.parentElement.parentElement.parentElement.querySelector("a + ul");
        if(menu){
            menu.classList.remove("is-hidden")
        }
    }
})

document.querySelectorAll("aside.menu .menu-list > li > a + ul").forEach(x => {
    x.previousElementSibling.addEventListener("click", e => {
        x.classList.toggle("is-hidden");
    });
})
</script>
<?php require "footer.php"; ?>