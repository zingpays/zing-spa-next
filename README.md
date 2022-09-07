<!--
 * @Author: Louis Yu louis.yu@flashwire.com
 * @Date: 2022-09-07 10:46:41
 * @LastEditTime: 2022-09-07 15:39:54
-->
# Quick start

```bash
docker-compose up -d
```

Then access to http://127.0.0.1:[port]/, [port] could be found in docker-compose.yml.

"/" serve via backend/public/dist/

"/api" serve via backend/public/index.php, such as http://127.0.0.1:[port]/api/user/index