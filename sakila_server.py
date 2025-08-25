elif parsed_path == "/":
    self.send_response(200)
    self.send_header("Content-type", "text/html; charset=utf-8")
    self.end_headers()
    with open("index.html", "r", encoding="utf-8") as f:
        self.wfile.write(f.read().encode("utf-8"))
