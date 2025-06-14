@echo off
cd /d "%~dp0"

:: ESTE SCRIPT ES SOLO PARA DESARROLLO EN WINDOWS

set START_BACKEND=true
set START_FRONTEND=true

:: CHECK ARGUMENTS
if "%~1"=="front" (
    set START_BACKEND=false
)
if "%~1"=="back" (
    set START_FRONTEND=false
)
if "%~1"=="all" (
    set START_FRONTEND=true
    set START_BACKEND=true
)

:: START BACKEND
if "%START_BACKEND%"=="true" (
    start cmd /k "php artisan serve"
)

:: START FRONTEND
if "%START_FRONTEND%"=="true" (
    start cmd /k "npm run dev"
)
