package com.example.mindtec.ui.test;

import android.os.Bundle;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.Button;
import android.widget.ImageView;
import android.widget.TextView;

import androidx.annotation.NonNull;
import androidx.fragment.app.Fragment;
import androidx.fragment.app.FragmentManager;
import androidx.fragment.app.FragmentTransaction;
import androidx.lifecycle.ViewModelProvider;

import com.bumptech.glide.Glide;
import com.bumptech.glide.request.RequestOptions;
import com.example.mindtec.PerfilFragment;
import com.example.mindtec.R;
import com.example.mindtec.ResultsFragment;
import com.example.mindtec.databinding.FragmentHomeBinding;

public class TestFragment extends Fragment {
    Button btnSubmit;
    ImageView imageView;
    TextView encabezadoTextView;
    private FragmentHomeBinding binding;

    public View onCreateView(@NonNull LayoutInflater inflater,
                             ViewGroup container, Bundle savedInstanceState) {
        TestViewModel testViewModel =
                new ViewModelProvider(this).get(TestViewModel.class);
        binding = FragmentHomeBinding.inflate(inflater, container, false);
        View root = binding.getRoot();

        btnSubmit = root.findViewById(R.id.btnSubmit);
        imageView = root.findViewById(R.id.imageView);
        encabezadoTextView = root.findViewById(R.id.encabezadoTextView);
        btnSubmit.setOnClickListener(v -> replaceFragment(new ResultsFragment()));
        encabezadoTextView.setOnClickListener(v -> replaceFragment(new PerfilFragment()));

        Glide.with(this)
                .load(R.drawable.logo)
                .apply(RequestOptions.circleCropTransform())
                .into(imageView);

        return root;
    }

    private void replaceFragment(Fragment fragment) {
        FragmentManager fragmentManager = requireActivity().getSupportFragmentManager();
        FragmentTransaction fragmentTransaction = fragmentManager.beginTransaction();
        fragmentTransaction.replace(R.id.container, fragment);
        fragmentTransaction.addToBackStack(null);
        fragmentTransaction.commit();
    }

    @Override
    public void onDestroyView() {
        super.onDestroyView();
        binding = null;
    }
}