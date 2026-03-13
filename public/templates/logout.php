<!DOCTYPE html>
<html lang="sk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logout - Blog CMS</title>
    <script>
        if (localStorage.getItem('daynight-theme') === 'carbon') {
            document.documentElement.classList.add('carbon');
        }
    </script>
    <link rel="stylesheet" href="../assets/css/admin.css">
</head>
<body>
    <div class="app-container">
        <main class="main-content" style="min-height: 100vh; display: flex; align-items: center; justify-content: center;">
            <div class="card" style="width: 100%; max-width: 520px;">
                <div style="padding: 2rem; text-align: center;">
                    <div style="width: 72px; height: 72px; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 1.5rem; background: var(--surface-color); border: 1px solid var(--border-color);">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="width: 32px; height: 32px;">
                            <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/>
                            <polyline points="16 17 21 12 16 7"/>
                            <line x1="21" y1="12" x2="9" y2="12"/>
                        </svg>
                    </div>

                    <h1 style="margin: 0 0 0.75rem;">Boli ste odhlásený</h1>
                    <p style="margin: 0 0 1.5rem; color: var(--text-secondary); line-height: 1.6;">
                        Toto je ukážková logout stránka pre admin rozhranie.  
                        Neskôr sem môže pribudnúť reálne odhlásenie session a presmerovanie na login.
                    </p>

                    <div style="display: flex; justify-content: center; gap: 0.75rem; flex-wrap: wrap;">
                        <a href="login.php" class="btn">Prejsť na Login</a>
                        <a href="home.php" class="btn btn-ghost">Späť na Web</a>
                    </div>
                </div>
            </div>
        </main>

        <footer class="footer">
            <p>&copy; 2026 Blog Admin. Demo rozhranie pre výučbu CRUD operácií.</p>
        </footer>
    </div>

    <script src="../assets/js/admin.js"></script>
</body>
</html>
