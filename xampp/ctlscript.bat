@echo off
rem START or STOP Services
rem ----------------------------------
rem Check if argument is STOP or START

if not ""%1"" == ""START"" goto stop

if exist F:\xampp\hypersonic\scripts\ctl.bat (start /MIN /B F:\xampp\server\hsql-sample-database\scripts\ctl.bat START)
if exist F:\xampp\ingres\scripts\ctl.bat (start /MIN /B F:\xampp\ingres\scripts\ctl.bat START)
if exist F:\xampp\mysql\scripts\ctl.bat (start /MIN /B F:\xampp\mysql\scripts\ctl.bat START)
if exist F:\xampp\postgresql\scripts\ctl.bat (start /MIN /B F:\xampp\postgresql\scripts\ctl.bat START)
if exist F:\xampp\apache\scripts\ctl.bat (start /MIN /B F:\xampp\apache\scripts\ctl.bat START)
if exist F:\xampp\openoffice\scripts\ctl.bat (start /MIN /B F:\xampp\openoffice\scripts\ctl.bat START)
if exist F:\xampp\apache-tomcat\scripts\ctl.bat (start /MIN /B F:\xampp\apache-tomcat\scripts\ctl.bat START)
if exist F:\xampp\resin\scripts\ctl.bat (start /MIN /B F:\xampp\resin\scripts\ctl.bat START)
if exist F:\xampp\jboss\scripts\ctl.bat (start /MIN /B F:\xampp\jboss\scripts\ctl.bat START)
if exist F:\xampp\jetty\scripts\ctl.bat (start /MIN /B F:\xampp\jetty\scripts\ctl.bat START)
if exist F:\xampp\subversion\scripts\ctl.bat (start /MIN /B F:\xampp\subversion\scripts\ctl.bat START)
rem RUBY_APPLICATION_START
if exist F:\xampp\lucene\scripts\ctl.bat (start /MIN /B F:\xampp\lucene\scripts\ctl.bat START)
if exist F:\xampp\third_application\scripts\ctl.bat (start /MIN /B F:\xampp\third_application\scripts\ctl.bat START)
goto end

:stop
echo "Stopping services ..."
if exist F:\xampp\third_application\scripts\ctl.bat (start /MIN /B F:\xampp\third_application\scripts\ctl.bat STOP)
if exist F:\xampp\lucene\scripts\ctl.bat (start /MIN /B F:\xampp\lucene\scripts\ctl.bat STOP)
rem RUBY_APPLICATION_STOP
if exist F:\xampp\subversion\scripts\ctl.bat (start /MIN /B F:\xampp\subversion\scripts\ctl.bat STOP)
if exist F:\xampp\jetty\scripts\ctl.bat (start /MIN /B F:\xampp\jetty\scripts\ctl.bat STOP)
if exist F:\xampp\hypersonic\scripts\ctl.bat (start /MIN /B F:\xampp\server\hsql-sample-database\scripts\ctl.bat STOP)
if exist F:\xampp\jboss\scripts\ctl.bat (start /MIN /B F:\xampp\jboss\scripts\ctl.bat STOP)
if exist F:\xampp\resin\scripts\ctl.bat (start /MIN /B F:\xampp\resin\scripts\ctl.bat STOP)
if exist F:\xampp\apache-tomcat\scripts\ctl.bat (start /MIN /B /WAIT F:\xampp\apache-tomcat\scripts\ctl.bat STOP)
if exist F:\xampp\openoffice\scripts\ctl.bat (start /MIN /B F:\xampp\openoffice\scripts\ctl.bat STOP)
if exist F:\xampp\apache\scripts\ctl.bat (start /MIN /B F:\xampp\apache\scripts\ctl.bat STOP)
if exist F:\xampp\ingres\scripts\ctl.bat (start /MIN /B F:\xampp\ingres\scripts\ctl.bat STOP)
if exist F:\xampp\mysql\scripts\ctl.bat (start /MIN /B F:\xampp\mysql\scripts\ctl.bat STOP)
if exist F:\xampp\postgresql\scripts\ctl.bat (start /MIN /B F:\xampp\postgresql\scripts\ctl.bat STOP)

:end

