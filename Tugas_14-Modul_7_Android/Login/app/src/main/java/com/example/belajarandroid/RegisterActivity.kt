package com.example.belajarandroid

import android.content.Intent
import android.os.Bundle
import android.widget.Button
import android.widget.Toast
import androidx.activity.enableEdgeToEdge
import androidx.appcompat.app.AppCompatActivity
import androidx.core.view.ViewCompat
import androidx.core.view.WindowInsetsCompat

class RegisterActivity : AppCompatActivity() {
    private lateinit var mRegister: Button
    private lateinit var mBack: Button

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_register)

        mRegister = findViewById(R.id.bt_register)
        mBack = findViewById(R.id.bt_back)

        mRegister.setOnClickListener {
            Toast.makeText(applicationContext, "Belum ada isi", Toast.LENGTH_SHORT).show()
        }

        mBack.setOnClickListener {
            val iBack = Intent(applicationContext, MainActivity::class.java)
            startActivity(iBack)
            finish()
        }
    }
        }

