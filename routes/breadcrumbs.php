<?php



use Diglactic\Breadcrumbs\Breadcrumbs;

// Controle
Breadcrumbs::for('dashboard', function ($trail) {
    $trail->push('Controle', route('dashboard'));
});

// Controle > Usuários
Breadcrumbs::for('users', function ($trail) {
    $trail->parent('dashboard');
    $trail->push('Usuários', route('users.index'));
});

// Controle > Usuários > Cadastras usuário
Breadcrumbs::for('users.create', function ($trail) {
    $trail->parent('users');
    $trail->push('Cadasto de usuário', route('users.create'));
});

// Controle > Usuários  [name] > [show]
Breadcrumbs::for('users.edit', function ($trail,$user) {
    $trail->parent('users');
    $trail->push($user->name,route('users.show', ['user' => $user]));
});


// Controle > Usuários
Breadcrumbs::for('products', function ($trail) {
    $trail->parent('dashboard');
    $trail->push('Produtos', route('products.index'));
});