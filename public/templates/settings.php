<?php
    include 'partials/header-admin.php';
?>

<main class="main-content">
    <div class="page-header">
        <h1 class="greeting">User Settings</h1>
        <p class="greeting-sub">Správa osobných nastavení používateľa a preferencií admin rozhrania.</p>
    </div>

    <div style="display:grid; grid-template-columns: minmax(0, 2fr) minmax(280px, 1fr); gap:1.5rem; align-items:start;">
        
        <div style="display:flex; flex-direction:column; gap:1.5rem;">
            
            <div class="card">
                <div class="card-header">
                    <div>
                        <h3 class="card-title">Profil</h3>
                        <p class="card-subtitle">Základné údaje používateľa</p>
                    </div>
                    <span class="badge badge-green">Account</span>
                </div>

                <div style="padding:0 1.5rem 1.5rem;">
                    <div style="display:grid; grid-template-columns:repeat(auto-fit, minmax(220px,1fr)); gap:1rem; margin-bottom:1rem;">
                        <div>
                            <label style="display:block; margin-bottom:0.5rem; font-weight:500;">Meno</label>
                            <input type="text" value="Alex" style="width:100%; padding:0.85rem 1rem; border:1px solid var(--border-color); border-radius:12px; background:var(--surface-color); color:var(--text-primary);">
                        </div>
                        <div>
                            <label style="display:block; margin-bottom:0.5rem; font-weight:500;">Priezvisko</label>
                            <input type="text" value="Matt" style="width:100%; padding:0.85rem 1rem; border:1px solid var(--border-color); border-radius:12px; background:var(--surface-color); color:var(--text-primary);">
                        </div>
                    </div>

                    <div style="display:grid; grid-template-columns:repeat(auto-fit, minmax(220px,1fr)); gap:1rem; margin-bottom:1rem;">
                        <div>
                            <label style="display:block; margin-bottom:0.5rem; font-weight:500;">Používateľské meno</label>
                            <input type="text" value="Alexmatt" style="width:100%; padding:0.85rem 1rem; border:1px solid var(--border-color); border-radius:12px; background:var(--surface-color); color:var(--text-primary);">
                        </div>
                        <div>
                            <label style="display:block; margin-bottom:0.5rem; font-weight:500;">Email</label>
                            <input type="email" value="Alex.matt@example.com" style="width:100%; padding:0.85rem 1rem; border:1px solid var(--border-color); border-radius:12px; background:var(--surface-color); color:var(--text-primary);">
                        </div>
                    </div>

                    <div style="margin-bottom:1rem;">
                        <label style="display:block; margin-bottom:0.5rem; font-weight:500;">Bio</label>
                        <textarea rows="5" style="width:100%; padding:0.85rem 1rem; border:1px solid var(--border-color); border-radius:12px; background:var(--surface-color); color:var(--text-primary); resize:vertical;">Author of the TechLight demo posts used in the admin panel.</textarea>
                    </div>

                    <div style="display:flex; gap:0.75rem; flex-wrap:wrap;">
                        <a href="#" class="btn">Save Profile</a>
                        <a href="admin.php" class="btn btn-ghost">Cancel</a>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <div>
                        <h3 class="card-title">Zmena hesla</h3>
                        <p class="card-subtitle">Aktualizácia prihlasovacích údajov</p>
                    </div>
                    <span class="badge badge-red">Security</span>
                </div>

                <div style="padding:0 1.5rem 1.5rem;">
                    <div style="display:flex; flex-direction:column; gap:1rem;">
                        <div>
                            <label style="display:block; margin-bottom:0.5rem; font-weight:500;">Aktuálne heslo</label>
                            <input type="password" placeholder="Zadaj aktuálne heslo" style="width:100%; padding:0.85rem 1rem; border:1px solid var(--border-color); border-radius:12px; background:var(--surface-color); color:var(--text-primary);">
                        </div>

                        <div>
                            <label style="display:block; margin-bottom:0.5rem; font-weight:500;">Nové heslo</label>
                            <input type="password" placeholder="Zadaj nové heslo" style="width:100%; padding:0.85rem 1rem; border:1px solid var(--border-color); border-radius:12px; background:var(--surface-color); color:var(--text-primary);">
                        </div>

                        <div>
                            <label style="display:block; margin-bottom:0.5rem; font-weight:500;">Potvrdenie nového hesla</label>
                            <input type="password" placeholder="Zopakuj nové heslo" style="width:100%; padding:0.85rem 1rem; border:1px solid var(--border-color); border-radius:12px; background:var(--surface-color); color:var(--text-primary);">
                        </div>
                    </div>

                    <div style="display:flex; gap:0.75rem; flex-wrap:wrap; margin-top:1rem;">
                        <a href="#" class="btn">Update Password</a>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <div>
                        <h3 class="card-title">Notifikácie</h3>
                        <p class="card-subtitle">Emailové a systémové upozornenia</p>
                    </div>
                    <span class="badge badge-green">Preferences</span>
                </div>

                <div style="padding:0 1.5rem 1.5rem;">
                    <div style="display:flex; flex-direction:column; gap:1rem;">
                        <label style="display:flex; align-items:center; justify-content:space-between; gap:1rem; padding:1rem; border:1px solid var(--border-color); border-radius:12px;">
                            <div>
                                <div style="font-weight:600;">Email notifikácie</div>
                                <div style="font-size:0.875rem; color:var(--text-secondary);">Posielať email pri dôležitých zmenách v systéme</div>
                            </div>
                            <input type="checkbox" checked>
                        </label>

                        <label style="display:flex; align-items:center; justify-content:space-between; gap:1rem; padding:1rem; border:1px solid var(--border-color); border-radius:12px;">
                            <div>
                                <div style="font-weight:600;">Notifikácie o nových článkoch</div>
                                <div style="font-size:0.875rem; color:var(--text-secondary);">Upozornenie pri vytvorení alebo úprave blog postu</div>
                            </div>
                            <input type="checkbox" checked>
                        </label>

                        <label style="display:flex; align-items:center; justify-content:space-between; gap:1rem; padding:1rem; border:1px solid var(--border-color); border-radius:12px;">
                            <div>
                                <div style="font-weight:600;">Marketing news</div>
                                <div style="font-size:0.875rem; color:var(--text-secondary);">Novinky o template a nových funkciách</div>
                            </div>
                            <input type="checkbox">
                        </label>
                    </div>

                    <div style="display:flex; gap:0.75rem; flex-wrap:wrap; margin-top:1rem;">
                        <a href="#" class="btn">Save Notifications</a>
                    </div>
                </div>
            </div>
        </div>

        <div style="display:flex; flex-direction:column; gap:1.5rem;">
            <div class="card">
                <div class="card-header">
                    <div>
                        <h3 class="card-title">Avatar & účet</h3>
                        <p class="card-subtitle">Rýchly prehľad profilu</p>
                    </div>
                </div>

                <div style="padding:0 1.5rem 1.5rem; text-align:center;">
                    <div style="width:88px; height:88px; border-radius:50%; display:flex; align-items:center; justify-content:center; font-size:2rem; font-weight:700; margin:0 auto 1rem; background:var(--surface-color); border:1px solid var(--border-color);">
                        A
                    </div>
                    <h3 style="margin:0 0 0.25rem;">Alex Matt</h3>
                    <p style="margin:0 0 1rem; color:var(--text-secondary);">Alex.matt@example.com</p>
                    <span class="badge badge-green">Author</span>

                    <div style="margin-top:1rem; display:flex; flex-direction:column; gap:0.75rem;">
                        <a href="#" class="btn btn-ghost">Upload Avatar</a>
                        <a href="#" class="btn btn-ghost">Remove Avatar</a>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <div>
                        <h3 class="card-title">Rozhranie</h3>
                        <p class="card-subtitle">Preferencie admin panelu</p>
                    </div>
                </div>

                <div style="padding:0 1.5rem 1.5rem;">
                    <div style="margin-bottom:1rem;">
                        <label style="display:block; margin-bottom:0.5rem; font-weight:500;">Jazyk rozhrania</label>
                        <select style="width:100%; padding:0.85rem 1rem; border:1px solid var(--border-color); border-radius:12px; background:var(--surface-color); color:var(--text-primary);">
                            <option selected>Slovenčina</option>
                            <option>English</option>
                        </select>
                    </div>

                    <div style="margin-bottom:1rem;">
                        <label style="display:block; margin-bottom:0.5rem; font-weight:500;">Počet záznamov na stránku</label>
                        <select style="width:100%; padding:0.85rem 1rem; border:1px solid var(--border-color); border-radius:12px; background:var(--surface-color); color:var(--text-primary);">
                            <option>10</option>
                            <option selected>25</option>
                            <option>50</option>
                            <option>100</option>
                        </select>
                    </div>

                    <div style="display:flex; flex-direction:column; gap:1rem;">
                        <label style="display:flex; align-items:center; justify-content:space-between; gap:1rem; padding:1rem; border:1px solid var(--border-color); border-radius:12px;">
                            <div>
                                <div style="font-weight:600;">Compact mode</div>
                                <div style="font-size:0.875rem; color:var(--text-secondary);">Hustejšie zobrazenie tabuliek a prvkov</div>
                            </div>
                            <input type="checkbox">
                        </label>

                        <label style="display:flex; align-items:center; justify-content:space-between; gap:1rem; padding:1rem; border:1px solid var(--border-color); border-radius:12px;">
                            <div>
                                <div style="font-weight:600;">Zapamätať filter tabuliek</div>
                                <div style="font-size:0.875rem; color:var(--text-secondary);">Rozhranie si pamätá posledné filtre</div>
                            </div>
                            <input type="checkbox" checked>
                        </label>
                    </div>

                    <div style="display:flex; gap:0.75rem; flex-wrap:wrap; margin-top:1rem;">
                        <a href="#" class="btn">Save Preferences</a>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <div>
                        <h3 class="card-title">Danger Zone</h3>
                        <p class="card-subtitle">Citlivé akcie nad účtom</p>
                    </div>
                </div>

                <div style="padding:0 1.5rem 1.5rem;">
                    <p style="margin-top:0; color:var(--text-secondary);">
                        Tu môže byť neskôr deaktivácia účtu, odhlásenie zo všetkých zariadení alebo zmazanie účtu.
                    </p>
                    <div style="display:flex; gap:0.75rem; flex-wrap:wrap;">
                        <a href="#" class="btn btn-ghost">Logout All Sessions</a>
                        <a href="#" class="btn btn-ghost">Deactivate Account</a>
                    </div>
                </div>
            </div>
        </div>

    </div>
</main>

<?php
    include 'partials/footer-admin.php';
?>