<?php

namespace app\Component\Interface;

interface Controller
{
    public function index(): void;
    public function create(): void;
    public function update(): void;
    public function delete(): void;

}