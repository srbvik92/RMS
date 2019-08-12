package com.example.tenantmanagementsystem;

import android.content.Intent;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.util.Log;
import android.view.View;
import android.widget.Button;
import android.widget.CheckBox;
import android.widget.EditText;
import android.widget.TextView;

public class LoginActivity extends AppCompatActivity {

    Button loginButton;
    EditText mobile;
    EditText pass;
    TextView loginMessageDisplay;
    CheckBox rememberMe;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_login);

        mobile = (EditText) findViewById(R.id.mobile);
        pass = (EditText) findViewById(R.id.pass);
        loginButton = (Button) findViewById(R.id.loginAction);
        loginMessageDisplay = (TextView) findViewById(R.id.loginMessage);
        loginMessageDisplay.setText(Variables.loginMessage);
        rememberMe = (CheckBox) findViewById(R.id.rememberMe);





        loginButton.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent loginIntent = new Intent(getApplicationContext(),LoginAction.class);
                loginIntent.putExtra("mobile", mobile.getText().toString());
                loginIntent.putExtra("pass", pass.getText().toString());
                if (rememberMe.isChecked()){
                    loginIntent.putExtra("remember me", true);
                }
                startActivity(loginIntent);
            }
        });

    }

    @Override
    public void onBackPressed() {
        Log.e("back pressed", "back pressed");
        Intent intent = new Intent(Intent.ACTION_MAIN);
        intent.addCategory(Intent.CATEGORY_HOME);
        intent.setFlags(Intent.FLAG_ACTIVITY_NEW_TASK);
        startActivity(intent);
    }
}
