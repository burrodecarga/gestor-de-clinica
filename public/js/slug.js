document.getElementById("medicina").addEventListener('keyup', cambiar);

            function cambiar() {
                medicina = document.getElementById("medicina").value;
                document.getElementById("slug").value = slug(medicina);
            }

            function slug(str) {
                var $slug = '';
                var trimmed = str.trim(str);
                $slug = trimmed.replace(/[^a-z0-9-]/gi, '-').
                replace(/-+/g, '-').
                replace(/^-|-$/g, '');
                return $slug.toLowerCase();
            }

