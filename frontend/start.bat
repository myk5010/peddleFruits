ren .\dist\index.html index.blade.php
xcopy .\dist\index.blade.php /y ..\resources\views
del /f /q .\dist\"*.php"
rmdir /s /q ..\public\css ..\public\js ..\public\fonts ..\public\img
for /d %%a in (.\dist) do xcopy /s /e /i /y %%a ..\public
pause