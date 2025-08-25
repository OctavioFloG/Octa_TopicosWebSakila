from http.server import BaseHTTPRequestHandler, HTTPServer
import mariadb
from urllib.parse import urlparse

# Configuración de conexión a MariaDB
db_config = {
    "host": "localhost",
    "user": "octavio_21031091",
    "password": "21031091",
    "database": "sakila",
    "port": 3306
}

class MyHandler(BaseHTTPRequestHandler):

    def do_GET(self):
        parsed_path = urlparse(self.path).path

        # --- Página principal ---
        if parsed_path == "/":
            self.send_response(200)
            self.send_header("Content-type", "text/html; charset=utf-8")
            self.end_headers()
            with open("index.html", "r", encoding="utf-8") as f:
                self.wfile.write(f.read().encode("utf-8"))

        # --- Películas ---
        elif parsed_path == "/films":
            conn = mariadb.connect(**db_config)
            cursor = conn.cursor(dictionary=True)
            cursor.execute("SELECT film_id, title, release_year FROM film LIMIT 20;")
            films = cursor.fetchall()
            conn.close()

            html = "<html><head><title>Películas</title></head><body>"
            html += "<h1>Películas</h1><a href='/'>🏠 Inicio</a><br><br>"
            html += "<table border=1><tr><th>ID</th><th>Título</th><th>Año</th></tr>"
            for f in films:
                html += f"<tr><td>{f['film_id']}</td><td>{f['title']}</td><td>{f['release_year']}</td></tr>"
            html += "</table></body></html>"

            self.send_response(200)
            self.send_header("Content-type", "text/html; charset=utf-8")
            self.end_headers()
            self.wfile.write(html.encode("utf-8"))

        # --- Actores ---
        elif parsed_path == "/actors":
            conn = mariadb.connect(**db_config)
            cursor = conn.cursor(dictionary=True)
            cursor.execute("SELECT actor_id, first_name, last_name FROM actor LIMIT 20;")
            actors = cursor.fetchall()
            conn.close()

            html = "<html><head><title>Actores</title></head><body>"
            html += "<h1>Actores</h1><a href='/'>🏠 Inicio</a><br><br>"
            html += "<table border=1><tr><th>ID</th><th>Nombre</th><th>Apellido</th></tr>"
            for a in actors:
                html += f"<tr><td>{a['actor_id']}</td><td>{a['first_name']}</td><td>{a['last_name']}</td></tr>"
            html += "</table></body></html>"

            self.send_response(200)
            self.send_header("Content-type", "text/html; charset=utf-8")
            self.end_headers()
            self.wfile.write(html.encode("utf-8"))

        else:
            self.send_error(404, "Página no encontrada")


if __name__ == "__main__":
    server_address = ("", 8000)  # localhost:8000
    httpd = HTTPServer(server_address, MyHandler)
    print("Servidor corriendo en http://127.0.0.1:8000/")
    httpd.serve_forever()
