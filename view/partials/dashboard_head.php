<?php include "head.php"; ?>
<?php //shouldn't do this, but don't know a better way! ?>
<?php $role = $this->authModel->userRole["name"]; ?>

<div class="columns">
    <div class="column is-one-fifth">
        <nav>
            <aside class="menu">
                <!-- <p class="menu-label">
                    General
                </p>
                <ul class="menu-list">
                    <li><a>Dashboard</a></li>
                    <li><a>Customers</a></li>
                </ul>
                <p class="menu-label">
                    Administration
                </p>
                <ul class="menu-list">
                    <li><a>Team Settings</a></li>
                    <li>
                        <a>Manage Your Team</a>
                        <ul class="is-hidden">
                            <li><a href="/admin">Members</a></li>
                            <li><a>Plugins</a></li>
                            <li><a>Add a member</a></li>
                        </ul>
                    </li>
                    <li><a>Invitations</a></li>
                    <li><a>Cloud Storage Environment Settings</a></li>
                    <li><a>Authentication</a></li>
                </ul>
                <p class="menu-label">
                    Transactions
                </p>
                <ul class="menu-list">
                    <li><a>Payments</a></li>
                    <li><a>Transfers</a></li>
                    <li><a>Balance</a></li>
                </ul> -->
                <ul class="menu-list">
                    <li><a href="/admin">Dashboard</a></li>
                </ul>

                <!-- bioscoop -->
                <?php if(in_array($role, ["bioscoop", "admin"])): ?>
                    <p class="menu-label">Bioscoop</p>
                    <ul class="menu-list">
                        <li>
                            <a>Bioscoop</a>
                            <ul class="is-hidden">
                                <li><a href="/bios/create">Toevoegen</a></li>
                                <!-- <li><a href="/bios/time">Tijden aangeven</a></li> -->
                            </ul>
                        </li>
                    </ul>
                <?php endif; ?>
                <!-- end bioscoop -->

                <!-- user -->
                <?php if(in_array($role, ["admin", "redacteur"])): ?>
                    <p class="menu-label">Gebruikers</p>
                    <ul class="menu-list">
                        <li>
                            <a>Bioscoop</a>
                            <ul class="is-hidden">
                                <li><a href="/users">Overzicht</a></li>
                                <li><a href="/users/create">Toevoegen</a></li>
                                <li><a href="/users/update">Wijzigen</a></li>
                                <li><a href="/users/delete">Verwijderen</a></li>
                            </ul>
                        </li>
                    </ul>
                <?php endif; ?>
                <!-- end user -->

            </aside>
        </nav>
    </div>
    <div class="column">
        <!-- content -->