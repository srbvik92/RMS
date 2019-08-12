package com.example.tenantmanagementsystem;

import android.content.Intent;
import android.content.SharedPreferences;
import android.preference.PreferenceManager;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.util.Log;

public class MainActivity extends AppCompatActivity {

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        //setContentView(R.layout.activity_main);

        //check logged in or not via shared preferences
        SharedPreferences data = PreferenceManager.getDefaultSharedPreferences(getApplicationContext());

        Variables.mobile = data.getString("mobile","null");

        Log.e("user", Variables.mobile);

        String loginAuthenticate = data.getString("loginAuthenticate", "no");

        Log.e("loginauthenticate", loginAuthenticate);


        //redirect to different activities as per logged in or not
        Intent intent = new Intent();

        if (loginAuthenticate.equals("yes")) {
            intent = new Intent(MainActivity.this, HomeActivity.class);
        } else if (loginAuthenticate=="no") {
            intent = new Intent(MainActivity.this,
                    LoginActivity.class);
        }
        else{
            intent = new Intent(MainActivity.this,
                    LoginActivity.class);
        }

        startActivity(intent);
        this.finish();
    }
}
