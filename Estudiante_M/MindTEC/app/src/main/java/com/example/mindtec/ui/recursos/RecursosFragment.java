package com.example.mindtec.ui.recursos;

import android.os.Bundle;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;

import androidx.annotation.NonNull;
import androidx.annotation.Nullable;
import androidx.fragment.app.Fragment;
import androidx.recyclerview.widget.LinearLayoutManager;
import androidx.recyclerview.widget.RecyclerView;

import com.example.mindtec.R;
import com.example.mindtec.Recursos;
import com.example.mindtec.RecursosAdapter;

import java.util.ArrayList;
import java.util.List;

public class RecursosFragment extends Fragment {
    private RecyclerView recyclerView;
    private RecursosAdapter recursosAdapter;
    private List<Recursos> recursosList;

    @Nullable
    @Override
    public View onCreateView(@NonNull LayoutInflater inflater, @Nullable ViewGroup container, @Nullable Bundle savedInstanceState) {
        View view = inflater.inflate(R.layout.fragment_recursos, container, false);

        recyclerView = view.findViewById(R.id.recyclerView);
        recyclerView.setLayoutManager(new LinearLayoutManager(getContext()));

        recursosList = new ArrayList<>();
        recursosList.add(new Recursos("Todo lo que necesitas saber de la ansiedad", "https://www.youtube.com/watch?v=S1g1cQjUguI"));
        recursosList.add(new Recursos("Síntomas de la ANSIEDAD", "https://www.youtube.com/watch?v=C1SN2qGOGtE"));
        recursosList.add(new Recursos("La ansiedad: ese niño asustado que llevas dentro", "https://www.youtube.com/watch?v=F0eFv7iVjF4"));



        recursosAdapter = new RecursosAdapter(recursosList, getContext());
        recyclerView.setAdapter(recursosAdapter);

        return view;
    }
}
