package com.example.tenantmanagementsystem;

import android.content.Context;
import android.util.Log;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.BaseAdapter;
import android.widget.TextView;

import org.w3c.dom.Text;

public class UpcomingTenantAdapter extends BaseAdapter {

    String[] mobile;
    String[] name;

    LayoutInflater mInflater;

    //context
    Context c1;

    public UpcomingTenantAdapter(Context c, String[] m, String[] n){
        mobile = m;
        name = n;
        this.c1 = c;
        mInflater = (LayoutInflater) c.getSystemService(Context.LAYOUT_INFLATER_SERVICE);
    }

    @Override
    public int getCount() {
        if(mobile == null) {
            return 0;
        }
        else {
            return mobile.length;
        }
    }

    @Override
    public Object getItem(int position) {
        return mobile[position];
    }

    @Override
    public long getItemId(int position) {
        return position;
    }

    @Override
    public View getView(int position, View convertView, ViewGroup parent) {

        convertView = mInflater.inflate(R.layout.upcoming_tenant_adapter, null);

        TextView nameTenant = convertView.findViewById(R.id.nameTenant);
        TextView mobileTenant = convertView.findViewById(R.id.mobileTenant);

        nameTenant.setText(name[position]);
        mobileTenant.setText(mobile[position]);

        Log.d("upcoming name", name[position]);

        return convertView;

    }
}


