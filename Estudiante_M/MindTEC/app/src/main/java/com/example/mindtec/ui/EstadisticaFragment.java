package com.example.mindtec.ui;

import android.os.Bundle;
import androidx.fragment.app.Fragment;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.LinearLayout;
import android.widget.TextView;

import com.example.mindtec.R;

public class EstadisticaFragment extends Fragment {

    private LinearLayout progresoEstres;
    private LinearLayout progresoCardiaco;
    private TextView valorEstres;
    private TextView valorCardiaco;

    @Override
    public View onCreateView(LayoutInflater inflater, ViewGroup container,
                             Bundle savedInstanceState) {

        View rootView = inflater.inflate(R.layout.fragment_estadistica, container, false);


        progresoEstres = rootView.findViewById(R.id.progreso_estres);
        progresoCardiaco = rootView.findViewById(R.id.progreso_cardiaco);
        valorEstres = rootView.findViewById(R.id.valor_estres);
        valorCardiaco = rootView.findViewById(R.id.valor_cardiaco);

        updateProgressBar(progresoEstres, valorEstres, 75);
        updateProgressBar(progresoCardiaco, valorCardiaco, 85);

        return rootView;
    }

    private void updateProgressBar(LinearLayout progressBar, TextView progressValue, int progress) {
        float weight = progress / 100.0f;
        LinearLayout.LayoutParams params = (LinearLayout.LayoutParams) progressBar.getLayoutParams();
        params.weight = weight;
        progressBar.setLayoutParams(params);

        progressValue.setText(progress + "%");
    }
}
