package com.example.mindtec.ui.agenda;

import android.os.Bundle;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;

import androidx.annotation.NonNull;
import androidx.annotation.Nullable;
import androidx.fragment.app.Fragment;
import androidx.recyclerview.widget.LinearLayoutManager;
import androidx.recyclerview.widget.RecyclerView;


import com.example.mindtec.CalendarAdapter;
import com.example.mindtec.R;

import java.util.ArrayList;
import java.util.Calendar;
import java.util.List;
import java.util.Locale;

public class AgendaFragment extends Fragment {

    @Nullable
    @Override
    public View onCreateView(@NonNull LayoutInflater inflater, @Nullable ViewGroup container, @Nullable Bundle savedInstanceState) {

        return inflater.inflate(R.layout.fragment_agenda, container, false);
    }

    @Override
    public void onViewCreated(@NonNull View view, @Nullable Bundle savedInstanceState) {
        super.onViewCreated(view, savedInstanceState);

        RecyclerView listAgenda = view.findViewById(R.id.list_agenda);
        listAgenda.setLayoutManager(new LinearLayoutManager(requireContext()));

        List<String> days = generateDaysForCurrentMonth();

        CalendarAdapter adapter = new CalendarAdapter(requireContext(), days);
        listAgenda.setAdapter(adapter);
    }

    private List<String> generateDaysForCurrentMonth() {
        List<String> days = new ArrayList<>();
        Calendar calendar = Calendar.getInstance();
        int daysInMonth = calendar.getActualMaximum(Calendar.DAY_OF_MONTH);

        for (int i = 1; i <= daysInMonth; i++) {
            if (i == 25) {
                days.add("25 - Sesión de psicología");
            } else {
                days.add(String.valueOf(i));
            }
        }

        return days;
    }
}
