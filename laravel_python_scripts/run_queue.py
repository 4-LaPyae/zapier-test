import subprocess
import sys
import os


LARAVEL_PATH = os.path.dirname(os.path.dirname(os.path.abspath(__file__)))
# print(BASE_DIR)
os.chdir(LARAVEL_PATH)

command = [
    "php",
    "artisan",
    "queue:work",
    "--stop-when-empty",
    "--tries=3"
]

result = subprocess.run(
    command,
    capture_output=True,
    text=True
)

print(result.stdout)

if result.stderr:
    print(result.stderr)
