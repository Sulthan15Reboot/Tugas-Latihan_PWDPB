import React, { useState } from 'react';

function GuessingGame() { 
    const [guess, setGuess] = useState(''); 
    const [message, setMessage] = useState(''); 
    const [targetNumber] = useState(Math.floor(Math.random() * 100) + 1); 
    const handleGuess = () => { 
        const userGuess = parseInt(guess, 10); 
        if (userGuess === targetNumber) { 
            setMessage('Tebakan kamu benar!'); 
        } else if (userGuess < targetNumber) { 
            setMessage('Terlalu rendah! Coba lagi.'); 
        } else { 
            setMessage('Terlalu tinggi! Coba lagi.'); 
        } 
    }; 
    return ( 
        <div> 
            <h1>Game Tebak Angka</h1> 
            <input type="number" value={guess} onChange={(e) => setGuess(e.target.value)} placeholder="Masukkan tebakan" /> 
            <button onClick={handleGuess}>Tebak</button> 
            <p>{message}</p> 
        </div> 
    );
}

export default GuessingGame;