package com.example.tenantmanagementsystem;

import android.content.Intent;
import android.net.Uri;
import android.os.AsyncTask;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.util.Log;
import android.view.View;
import android.widget.AdapterView;
import android.widget.ImageView;
import android.widget.ListView;

import org.json.JSONArray;
import org.json.JSONObject;

import java.io.BufferedReader;
import java.io.BufferedWriter;
import java.io.InputStreamReader;
import java.io.OutputStream;
import java.io.OutputStreamWriter;
import java.net.HttpURLConnection;
import java.net.URL;
import java.net.URLEncoder;
import java.util.ArrayList;
import java.util.Iterator;
import java.util.List;

import javax.net.ssl.HttpsURLConnection;

public class HomeActivity extends AppCompatActivity {

    //layout elements and variables for upcoming tenants, overdue tenants
    ListView upcomingTenantListView, overdueTenantListView;
    String[] mobileUpcomingTenants, mobileOverdueTenants;
    String[] nameUpcomingTenants, nameOverdueTenants;

    String line;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_home);

        //set the layout and adapter for upcoming tenants
        upcomingTenantListView = findViewById(R.id.upcomingTenants);
        UpcomingTenantAdapter upa = new UpcomingTenantAdapter(getApplicationContext(), null, null);
        upcomingTenantListView.setAdapter(upa);

        //set on click listener
        upcomingTenantListView.setOnItemClickListener(new AdapterView.OnItemClickListener() {
            @Override
            public void onItemClick(AdapterView<?> parent, View view, int position, long id) {
                String mobile = mobileUpcomingTenants[position];
                Intent intent = new Intent(Intent.ACTION_DIAL);
                intent.setData(Uri.parse("tel:"+mobile));
                startActivity(intent);
            }
        });

        //set the layout for overdue tenants
        overdueTenantListView = findViewById(R.id.overdueTenantListVIew);
        OverdueTenantAdapter ota = new OverdueTenantAdapter(getApplicationContext(), null, null);
        overdueTenantListView.setAdapter(ota);

        //set on click listener
        overdueTenantListView.setOnItemClickListener(new AdapterView.OnItemClickListener() {
            @Override
            public void onItemClick(AdapterView<?> parent, View view, int position, long id) {
                String mobile = mobileOverdueTenants[position];
                Intent intent = new Intent(Intent.ACTION_DIAL);
                intent.setData(Uri.parse("tel:"+mobile));
                startActivity(intent);
            }
        });

        new GetHomeDetails().execute();
    }


    //get details for displaying from server
    public class GetHomeDetails extends AsyncTask<String, Void, String> {

        ImageView bmImage;

        protected void onPreExecute(){}

        protected String doInBackground(String... arg0) {

            try {

                URL url = new URL(Variables.servername+"android/user_home_android.php"); // here is your URL path



                JSONObject postDataParams = new JSONObject();
                postDataParams.put("mobile",Variables.mobile);
                //postDataParams.put("pass",pass);
                Log.e("params",postDataParams.toString());

                HttpURLConnection conn = (HttpURLConnection) url.openConnection();
                conn.setReadTimeout(15000 /* milliseconds */);
                conn.setConnectTimeout(15000 /* milliseconds */);
                conn.setRequestMethod("POST");
                conn.setDoInput(true);
                conn.setDoOutput(true);

                OutputStream os = conn.getOutputStream();
                BufferedWriter writer = new BufferedWriter(
                        new OutputStreamWriter(os, "UTF-8"));
                writer.write(getPostDataString(postDataParams));

                writer.flush();
                writer.close();
                os.close();

                int responseCode=conn.getResponseCode();

                if (responseCode == HttpsURLConnection.HTTP_OK) {

                    BufferedReader in=new BufferedReader(new
                            InputStreamReader(
                            conn.getInputStream()));

                    StringBuffer sb = new StringBuffer("");


                    while((line = in.readLine()) != null) {

                        sb.append(line);
                        break;
                    }

                    JSONArray arr = new JSONArray(sb.toString());

                    //JSONObject jsonObject = new JSONObject(sb.toString());

                    String mobileTenants[] = new String[arr.length()];
                    String nameTenants[] = new String[arr.length()];

                    String type;

                    //add data raceived into array list by the type of data like upcoming or overdue
                    ArrayList<String> mobileU = new ArrayList<String>();
                    ArrayList<String> nameU = new ArrayList<String>();
                    ArrayList<String> mobileO = new ArrayList<String>();
                    ArrayList<String> nameO = new ArrayList<String>();

                    for(int n=0; n<arr.length(); n++){
                        Log.d("for", n+"");
                        JSONObject obj = arr.getJSONObject(n);
                        type = obj.getString("type");
                        if (obj != null){
                            switch (type){
                                case "upcoming":
                                    nameU.add(obj.getString("name_tenant"));
                                    mobileU.add(obj.getString("mobile_tenant"));
                                    //Log.d("upcoming", obj.getString("name_tenant"));
                                    break;
                                case "overdue":
                                    nameO.add(obj.getString("name_tenant"));
                                    mobileO.add(obj.getString("mobile_tenant"));
                                    //Log.d("overdue", obj.getString("name_tenant"));
                                    break;
                            }
                        }
                    }

                    int lengthUpcoming = nameU.size();
                    int lengthOverdue = nameO.size();

                    //Log.d("length overdue", lengthOverdue+"");

                    mobileUpcomingTenants = new String[lengthUpcoming];
                    nameUpcomingTenants = new String[lengthUpcoming];
                    mobileOverdueTenants = new String[lengthOverdue];
                    nameOverdueTenants = new String[lengthOverdue];

                    for(int n=0; n<lengthUpcoming; n++){
                        nameUpcomingTenants[n] = nameU.get(n);
                        mobileUpcomingTenants[n] = mobileU.get(n);
                    }

                    for(int n=0; n<lengthOverdue; n++){
                        nameOverdueTenants[n] = nameO.get(n);
                        mobileOverdueTenants[n] = mobileO.get(n);
                        Log.d("overdue", nameOverdueTenants[n]);
                    }


                    /*for(int n=0; n<2; n++){
                        Log.d("for", n+"");
                        JSONObject obj = arr.getJSONObject(n);
                        if (obj != null) {
                            nameUpcomingTenants[n]=obj.getString("name_tenant");
                            mobileUpcomingTenants[n]=obj.getString("mobile_tenant");

                        }
                    }

                    for(int n=2; n<4; n++){

                        JSONObject obj = arr.getJSONObject(n);
                        if (obj != null) {
                            Log.d("for", n+"");
                            nameOverdueTenants[n-2]=obj.getString("name_tenant");
                            mobileOverdueTenants[n-2]=obj.getString("mobile_tenant");
                            Log.e("overdue tenants", nameOverdueTenants[n-2]);

                        }
                    } */


                    in.close();
                    //user.setText(title[2]);
                    return sb.toString();


                }
                else {
                    return new String("false : "+responseCode);
                }
            }
            catch(Exception e){
                Log.e("line number", e.getStackTrace()[0].getLineNumber()+"");
                return new String("Exceptionbubi: " + e.getMessage());
            }

        }

        @Override
        protected void onPostExecute(String result) {
            //Toast.makeText(getActivity().getApplicationContext(), result,
            //Toast.LENGTH_LONG).show();
            //user.setText(loginMessage);

            Log.e("home activity", result);

            //add and notify the listview that data has been fetched and now load into listview
            //Log.d("name upcoming", nameUpcomingTenants[0]);
            UpcomingTenantAdapter upa = new UpcomingTenantAdapter(getApplicationContext(), mobileUpcomingTenants, nameUpcomingTenants);

            upcomingTenantListView.setAdapter(upa);

            upa.notifyDataSetChanged();

            //Log.d("name overdue", nameOverdueTenants[0]);
            OverdueTenantAdapter ota = new OverdueTenantAdapter(getApplicationContext(), mobileOverdueTenants, nameOverdueTenants);
            ota.notifyDataSetChanged();

        }
    }

    public String getPostDataString(JSONObject params) throws Exception {

        StringBuilder result = new StringBuilder();
        boolean first = true;

        Iterator<String> itr = params.keys();

        while(itr.hasNext()){

            String key= itr.next();
            Object value = params.get(key);

            if (first)
                first = false;
            else
                result.append("&");

            result.append(URLEncoder.encode(key, "UTF-8"));
            result.append("=");
            result.append(URLEncoder.encode(value.toString(), "UTF-8"));

        }
        return result.toString();
    }
}
