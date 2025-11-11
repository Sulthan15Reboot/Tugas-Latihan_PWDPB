package com.example.belajarandroid

import android.content.Intent
import android.os.Bundle
import android.widget.AutoCompleteTextView
import android.widget.Button
import android.widget.EditText
import android.widget.Toast
import androidx.activity.enableEdgeToEdge
import androidx.appcompat.app.AppCompatActivity
import androidx.core.view.ViewCompat
import androidx.core.view.WindowInsetsCompat

class LoginActivity : AppCompatActivity() {
    private lateinit var emailView: AutoCompleteTextView
    private lateinit var passwordView: EditText
    private lateinit var signinButton: Button
    private lateinit var backbutton: Button

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_login)

        emailView = findViewById(R.id.email)
        passwordView = findViewById(R.id.password)
        signinButton = findViewById(R.id.email_sign_in_button)
        backbutton = findViewById(R.id.btn_back)

        signinButton.setOnClickListener {
            val email = emailView.text.toString()
            val password = passwordView.text.toString()

            if (email.isNotEmpty() && password.isNotEmpty()) {
                Toast.makeText(this, "Login Succesful", Toast.LENGTH_LONG).show()
            } else {
                Toast.makeText(this, "Please fill in both fields", Toast.LENGTH_SHORT).show()
            }
            }
        backbutton.setOnClickListener{
            val backIntent = Intent(this, MainActivity::class.java)
            startActivity(backIntent)
            finish()
        }
        }
    }