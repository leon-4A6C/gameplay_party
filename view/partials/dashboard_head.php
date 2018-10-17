<?php include "head.php"; ?>
<?php //shouldn't do this, but don't know a better way! ?>
<?php $role = $this->authModel->userRole["role_name"]; ?>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

<div class="columns" style="margin-top: 15em;">
    <div class="column is-one-fifth">
        <nav>
            <aside class="menu">
                <ul class="menu-list">
                    <li><a href="/admin">Dashboard</a></li>
                </ul>

                <!-- bioscoop -->
                <?php if(in_array($role, ["bioscoop", "admin"])): ?>
                    <p class="menu-label">Bioscoop</p>
                    <ul class="menu-list">
                        <li><a href="/bios/create">Toevoegen</a></li>
                        <?php if(in_array($role, ["bioscoop"])): ?>
                            <li><a href="/bios/tijden">Tijden aangeven</a></li>
                        <?php endif; ?>
                    </ul>
                <?php endif; ?>
                <!-- end bioscoop -->

                <!-- user -->
                <?php if(in_array($role, ["admin", "redacteur"])): ?>
                    <p class="menu-label">Gebruikers</p>
                    <ul class="menu-list">
                        <li>
                            <a href="/users/create">Toevoegen</a>
                        </li>
                    </ul>
                <?php endif; ?>
                <!-- end user -->

            </aside>
        </nav>
    </div>
    <div class="column">
        <!-- content -->