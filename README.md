# Card Game Project

## Description

This project is a web application developed using Symfony that simulates a card game. It features a dynamically generated deck of cards and allows users to draw a hand of 10 cards, which can be sorted and displayed based on shuffled orders of suits and ranks.

## Features

- **Dynamic Card Shuffling**: Cards are shuffled every time the game is loaded, ensuring a unique experience with every new game.
- **Draw and Display Hand**: Users can draw a hand of 10 random cards from the deck.
- **Customizable Orders**: The application supports custom orders for suits and ranks, set via configuration.

## Getting Started

Follow these instructions to get a copy of the project up and running on your local machine for development and testing purposes.

### Prerequisites

You will need the following tools installed on your system:

- PHP 7.4 or later
- Composer
- Symfony CLI
- Node.js and Yarn (for asset management)

### Installation

1. **Clone the repository**:

git clone https://github.com/lechaabani/card-game.git
cd card-game


2. **Install PHP dependencies**:

composer install


3. **Install JavaScript and CSS assets**:

yarn install
yarn encore dev

4. **Start the development server**:

symfony server:start

Visit `http://localhost:8000` in your web browser to see the application in action.

## Running Tests

php bin/phpunit
