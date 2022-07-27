@ECHO OFF
PUSHD .
FOR /R %%d IN (.) DO (
cd "%%d"
IF EXIST *.php (
REN *.php *.blade.php
)
)
POPD